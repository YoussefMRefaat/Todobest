<?php

namespace App\Traits\User;

trait Updatable{
    /**
     * Update user's information
     *
     * @param array $validated
     */
    public function updateAndCheckVerification(array $validated){
        // Check if the email address has been changed to handle email verification process
        if(isset($validated['email']) && $validated['email'] !== auth()->user()->email){
            // Update if the email has been changed
            auth()->user()->update([
                'name' => $validated['name'] ?? auth()->user()->name,
                'email' => $validated['email'],
                'email_verified_at' => null,
                'timezone' => $validated['timezone'] ?? auth()->user()->timezone
            ]);
        }else{
            // Update if the email hasn't been changed
            auth()->user()->update([
                'name' => $validated['name'] ?? auth()->user()->name,
                'timezone' => $validated['timezone'] ?? auth()->user()->timezone
            ]);
        }
    }
}
