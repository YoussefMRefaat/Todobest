<?php

namespace App\Http\Controllers\ApiControllers\Auth;
use App\Http\Controllers\ApiControllers\ApiController;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends ApiController
{
    /**
     * Handle a login request.
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        // Check credentials
        if(!Auth::attempt($request->only('email' , 'password')))
            abort(401 , 'Invalid email or password');

        // Generate an authentication token
        $token = $request->user()->createToken('authToken');

        // Return success with the token and its type
        return $this->successResponse(200 , 'Logged in' , [
            'token' => $token->plainTextToken,
            'type' => 'Bearer',
        ]);
    }

    /**
     * Delete an authentication token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(): \Illuminate\Http\JsonResponse
    {
        // Delete the token based on current user's access
        Auth::user()->currentAccessToken()->delete();

        // Return a response
        return $this->successResponse(200 , 'Logged out');
    }

    /**
     * Redirect the user to the web app if he forgot the password - temporary
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function forgotPassword(): \Illuminate\Http\JsonResponse
    {
        // Redirect the user to the web app
        return $this->redirectResponse(
            307 ,
            'User should be redirected to the URI to complete this process',
            route('password.request'));
    }

    /**
     * Redirect the user to the web app if he is verifying his email - temporary
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function verifyEmail(): \Illuminate\Http\JsonResponse
    {
        // Check if the user has verified his email address before redirection.
        if(auth()->user()->hasVerifiedEmail())
             abort(409 , 'Email is already verified');

        // Return a response
        return $this->redirectResponse(
                307,
                'User should be redirected to the URI to complete this process',
                route('verification.notice')
        );
    }

}
