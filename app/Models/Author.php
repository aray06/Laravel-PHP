<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // Не забудьте импортировать этот класс

class Author extends Model
{
    // 1. Разрешаем массовое заполнение полей (name и email)
    protected $fillable = ['name', 'email'];

    /**
     * 2. Определяем связь "Один-ко-многим" (One-to-Many)
     * У одного автора может быть много книг.
     */
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
