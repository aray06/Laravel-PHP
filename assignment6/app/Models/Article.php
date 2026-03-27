<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // Указываем, какие поля можно заполнять через форму
    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

    // Указываем связь: статья ПРИНАДЛЕЖИТ пользователю
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
