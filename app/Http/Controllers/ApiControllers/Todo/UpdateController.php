<?php

namespace App\Http\Controllers\ApiControllers\Todo;

use App\Http\Controllers\ApiControllers\ApiController;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use App\Traits\Todo\Accessible;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateController extends ApiController
{
    use Accessible;

    /**
     * Update a todo
     * This method doesn't update dates to be null, clearDate() does.
     *
     * @param int $id
     * @param TodoRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(int $id , TodoRequest $request): \Illuminate\Http\JsonResponse
    {
        // Try to access the todo
        $todo = $this->access($id);

        // Validate the inputs
        $validated = $request->validated();

        // Update the todo
        $todo->update([
            'content' => $validated['content'] ,
            'due_date' => $validated['due_date'] ?? $todo->due_date,
            'reminder' => $validated['reminder'] ?? $todo->reminder,
        ]);

        // Return a response
        return $this->successResponse(200 , 'Updated successfully');
    }

    /**
     * Update a date column to be null
     *
     * @param string $date
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function clearDate(int $id ,string $date): \Illuminate\Http\JsonResponse
    {
        // Try to access the todo
        $todo = $this->access($id);

        // Check if the column is 1-exists in todos table && 2-a date && 3-fillable
        if(!in_array($date , ['due_date' , 'reminder']))
            abort(404 , $date . ' not found');

        // Update the date column
        $todo->update([
            $date => null
        ]);

        // Return a response
        return $this->successResponse(200 , 'Updated successfully');
    }

    /**
     * Update a todo to be done
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function toDone(int $id): \Illuminate\Http\JsonResponse
    {
        // Try to access the todo
        $todo = $this->access($id);

        // Check if the todo is already done
        if($todo->is_done)
            abort(400 , 'This todo is already done');

        // Mark the todo as done
        $todo->update([
            'is_done' => true,
            'completed_at' => Carbon::now(),
        ]);

        // Return a response
        return $this->successResponse(200 , 'Updated successfully');
    }

    /**
     * Update a todo to be undone
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function toUndone(int $id): \Illuminate\Http\JsonResponse
    {
        // Try to access the todo
        $todo = $this->access($id);

        // Check if the todo is not done
        if(!$todo->is_done)
            abort(400 , 'This todo is not done yet');

        // Mark the todo as undone
        $todo->update([
            'is_done' => false,
            'completed_at' => null,
        ]);

        // Return a response
        return $this->successResponse(200 , 'Updated Successfully');
    }
}
