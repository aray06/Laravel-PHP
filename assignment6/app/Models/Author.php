<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    // Разрешаем массовое заполнение этих полей
    protected $fillable = ['name', 'surname', 'birthdate'];

    // 2️⃣ Define Model Relationships: У автора много книг
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }

    // 3️⃣ Implement fullName() method
    public function fullName(): string
    {
        return "{$this->name} {$this->surname}";
    }
}
