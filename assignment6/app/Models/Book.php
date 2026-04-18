<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    protected $fillable = ['title', 'short_title', 'year', 'author_id'];

    // 2️⃣ Define Model Relationships: Книга принадлежит автору
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}
