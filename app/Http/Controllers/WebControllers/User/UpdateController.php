<?php

namespace App\Http\Controllers\WebControllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Traits\User\Updatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Void_;

class UpdateController extends Controller
{
    use Updatable;

    /**
     * Show an update form
     *
     * @return \Illuminate\View\View
     */
    public function edit(): \Illuminate\View\View
    {
        // Try to access user's data
        $user = User::findOrFail(auth()->id());

        // Return the view
        return view('user.update' , ['user' => $user]);
    }

    /**
     * Handle an update request
     *
     * @param UpdateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request): \Illuminate\Http\RedirectResponse
    {
        // Validate the inputs
        $validated = $request->validated();

        // Update the data
        $this->updateAndCheckVerification($validated);

        // Redirect to the view
        return redirect(route('updateUser'));
    }

    /**
     * Show an update password form
     *
     * @return \Illuminate\View\View
     */
    public function editPassword(): \Illuminate\View\View
    {
        // Return the view
        return view('user.update-password');
    }

    /**
     * Handle an update password request
     *
     * @param UpdatePasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(UpdatePasswordRequest $request): \Illuminate\Http\RedirectResponse
    {
        // Validate the inputs
        $validated = $request->validated();

        // Update the password
        auth()->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        // Redirect to the view
        return redirect(route('updatePassword'));
    }
}
