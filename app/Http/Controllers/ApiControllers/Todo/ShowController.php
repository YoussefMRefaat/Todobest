<?php

namespace App\Http\Controllers\ApiControllers\Todo;

use App\Http\Controllers\ApiControllers\ApiController;
use App\Models\Todo;
use App\Traits\Todo\Accessible;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class ShowController extends ApiController
{
    use Accessible;

    /**
     * Return all user's todos
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        // Get the todos
        $todos = Todo::where('user_id' , auth()->id())->get();

        // Return a response
        return $this->successResponse(200 , data:[
            'todos' => $todos,
        ]);
    }

    /**
     * Return a specific todo
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        // Try to access the todo
        $todo = $this->access($id);

        // Return a response
        return $this->successResponse(200 , data: [
            'todo' => $todo
        ]);
    }
}
