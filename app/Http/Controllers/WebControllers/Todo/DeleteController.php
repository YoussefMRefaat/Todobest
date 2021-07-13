<?php

namespace App\Http\Controllers\WebControllers\Todo;

use App\Http\Controllers\Controller;
use App\Traits\Todo\Accessible;
use App\Traits\Todo\Deletable;

class DeleteController extends Controller
{

    use Accessible;

    /**
     * Handle a delete todo request
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        // Try to access the todo
        $todo = $this->access($id);

        // Delete the todo
        $todo->delete();

        // Return a response
        return $this->successResponse(200 , 'Deleted successfully');
    }
}
