<?php

namespace App\Http\Controllers\ApiControllers\User;

use App\Http\Controllers\ApiControllers\ApiController;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Traits\User\Updatable;
use Illuminate\Support\Facades\Hash;

class UpdateController extends ApiController
{
    use Updatable;

    /**
     * Handle an update user request
     *
     * @param UpdateUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateUserRequest $request): \Illuminate\Http\JsonResponse
    {
        // Validate the inputs
        $validated = $request->validated();

        // Update the data
        $this->updateAndCheckVerification($validated);

        // Return a response
        return $this->successResponse(200 , 'Updated successfully');
    }

    /**
     * Handle an update user's password request
     *
     * @param UpdatePasswordRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatePassword(UpdatePasswordRequest $request): \Illuminate\Http\JsonResponse
    {
        // Validate the inputs
        $validated = $request->validated();

        // Update the password
        auth()->user()->update([
            'password' => Hash::make($validated['password']),
        ]);
        // Return a response
        return $this->successResponse(200 , 'Updated successfully');
    }
}
