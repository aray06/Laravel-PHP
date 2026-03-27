<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Показывает список всех статей
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    // Сохраняет новую статью в базу
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        // Создаем статью через связь с текущим юзером
        $request->user()->articles()->create($request->all());

        return redirect()->route('articles.index');
    }

    // Добавим метод для удаления (по заданию CRUD нужен)
    public function destroy(Article $article)
    {
        // Проверяем, что статью удаляет либо автор, либо админ
        if (auth()->user()->id === $article->user_id || auth()->user()->role === 'admin') {
            $article->delete();
        }

        return redirect()->route('articles.index');
    }
}
