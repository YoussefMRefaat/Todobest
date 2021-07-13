<?php

namespace App\Http\Controllers\ApiControllers\Auth;

use App\Http\Controllers\ApiControllers\ApiController;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class RegisterController extends ApiController
{
    /**
     * Handle a register request
     *
     * @param RegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(RegisterRequest $request): \Illuminate\Http\JsonResponse
    {
        //Validate the inputs
        $validated = $request->validated();

        //Store the user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'timezone' => $validated['timezone'],
            'password' => Hash::make($validated['password']),
        ]);

        //Login the registered user
        return $this->login($user);
    }

    /**
     * Login the registered user
     *
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    private function login(User $user): \Illuminate\Http\JsonResponse
    {

        // Create an authentication token
        $token = $user->createToken('auth_token');

        // Return the token and its type
        return $this->successResponse(201 , 'Registered successfully' , [
            'token' => $token->plainTextToken,
            'type' => 'Bearer'
        ]);
    }

}
