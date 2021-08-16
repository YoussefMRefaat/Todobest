<?php

namespace App\Http\Controllers\ApiControllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ShowController extends Controller
{

    /**
     * Get user's information
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(): \Illuminate\Http\JsonResponse
    {
        $user = User::select('name' , 'email' , 'timezone')->find(auth()->id());

        return $this->successResponse(200 , data: [
            'user' => $user,
        ]);
    }
}
