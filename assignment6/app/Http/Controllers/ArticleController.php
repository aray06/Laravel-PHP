<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // 1. Показ всех статей
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    // 2. Создание новой статьи
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        auth()->user()->articles()->create($request->all());

        return redirect()->route('articles.index');
    }

    // 3. Форма редактирования (ТОЛЬКО ОДИН РАЗ!)
    public function edit(Article $article)
    {
        // Проверка: править может только автор или модератор
        if (auth()->id() !== $article->user_id && auth()->user()->role !== 'moderator') {
            abort(403, 'У вас нет прав на редактирование этой статьи');
        }
        return view('articles.edit', compact('article'));
    }

    // 4. Сохранение обновлений
    public function update(Request $request, Article $article)
    {
        if (auth()->id() !== $article->user_id && auth()->user()->role !== 'moderator') {
            abort(403);
        }

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $article->update($request->all());
        return redirect()->route('articles.index');
    }

    // 5. Удаление
    public function destroy(Article $article)
    {
        if (auth()->id() === $article->user_id || auth()->user()->role === 'moderator') {
            $article->delete();
        }

        return redirect()->route('articles.index');
    }
}
