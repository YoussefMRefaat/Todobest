<?php

namespace App\Http\Controllers\WebControllers\Todo;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoRequest;
use App\Traits\Todo\Insertable;

class CreateController extends Controller
{

    use Insertable;

    /**
     * Handle a create todo request
     *
     * @param TodoRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TodoRequest $request): \Illuminate\Http\JsonResponse
    {
        // Validate and store - from Insertable trait
        $this->create($request);

        // Return a response
        return $this->successResponse(201 , 'Added successfully');
    }
}
