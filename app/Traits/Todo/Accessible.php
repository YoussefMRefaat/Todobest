<?php

namespace App\Traits\Todo;

use App\Models\Todo;
use App\Traits\JSONRespondable;
use Illuminate\Database\Eloquent\ModelNotFoundException;

trait Accessible{
    use JSONRespondable;

    /**
     * Return a todo if the authenticated user can access it.
     *
     * @param int $id
     * @return Todo
     */
    public function access(int $id): Todo
    {
        // Try to find the todo
        try{
            $todo = Todo::findOrFail($id);
        }catch (ModelNotFoundException){
            abort(400 , 'Todo does not exist');
        }

        // Check if the todo belongs to the authenticated user
        if(!auth()->user()->can('access' , $todo))
            abort(403 , 'User cannot access this todo');

        // Return the todo
        return $todo;
    }
}
