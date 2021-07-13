<?php

namespace App\Http\Controllers\ApiControllers\Todo;

use App\Http\Controllers\ApiControllers\ApiController;
use App\Http\Requests\TodoRequest;
use App\Traits\Todo\Insertable;

class CreateController extends ApiController
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
        $todo =  $this->create($request);

        // Return a response
        return $this->successResponse(201 , 'Added successfully' , ['todo' => $todo]);

    }
}
