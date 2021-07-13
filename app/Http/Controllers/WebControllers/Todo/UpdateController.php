<?php

namespace App\Http\Controllers\WebControllers\Todo;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use App\Traits\Todo\Accessible;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class UpdateController extends Controller
{

    use Accessible;

    /**
     * Handle done & undone requests
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function doneHandle(int $id){
        // Try to access the todo
        $todo = $this->access($id);

        // Handle the process based on todo's status
        $this->compare($todo);

        // Return a response
        return $this->successResponse(200 , 'Updated successfully');
    }

    /**
     * Reverse a todo's status
     *
     * @param Todo $todo
     */
    private function compare(Todo $todo){
        //If the todo is done, update it to be undone. And vice versa.
        if($todo->is_done)
            $todo->update([
                'is_done' => false,
                'completed_at' => null,
            ]);
        else
            $todo->update([
                'is_done' => true,
                'completed_at' => Carbon::now(),
            ]);
    }
}
