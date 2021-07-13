<?php

namespace App\Traits\Todo;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;

trait Insertable{

    /**
     * Store a todo
     *
     * @param TodoRequest $request
     * @return Todo
     */
    public function create(TodoRequest $request): Todo
    {
        // Validate the inputs
        $validated = $request->validated();

        // Store the todo in DB and return it
        return Todo::create([
            'user_id' => auth()->id(),
            'content' => $validated['content'],
            'due_date' => $validated['due_date'] ?? null,
            'reminder' => $validated['reminder'] ?? null,
        ]);
    }
}
