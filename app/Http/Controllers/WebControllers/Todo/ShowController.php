<?php

namespace App\Http\Controllers\WebControllers\Todo;

use App\Http\Controllers\Controller;

use App\Models\Todo;

class ShowController extends Controller
{
    /**
     * Return the main view and pass all user's todos.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\view\View
    {
        // Get all todos
        $todos = Todo::where('user_id' , auth()->id())->get();

        // Return the main view
        return view('todo/todos' , ['todos' => $todos]);
    }
}
