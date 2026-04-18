<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function store(Request $request)
    {
        // Валидация данных
        $validated = $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'birthdate' => 'required|date',
        ]);

        // Создание автора
        Author::create($validated);

        // Редирект (нужен для теста)
        return redirect('/authors');
    }
}
