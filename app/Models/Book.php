<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    // Разрешаем поля для книги
    protected $fillable = ['title', 'description', 'author_id'];

    /**
     * Определяем обратную связь: книга принадлежит автору.
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}
