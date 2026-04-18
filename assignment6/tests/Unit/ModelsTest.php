<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Author;
use App\Models\Book;

class ModelsTest extends TestCase
{
    /** @test */
    public function test_author_returns_full_name()
    {
        // Проверяем метод fullName()
        $author = new Author([
            'name' => 'Aray',
            'surname' => 'Yess'
        ]);

        $this->assertEquals('Aray Yess', $author->fullName());
    }

    /** @test */
    public function test_book_has_short_title_attribute()
    {
        // Проверяем атрибут short_title
        $book = new Book([
            'title' => 'The Great Gatsby',
            'short_title' => 'Gatsby'
        ]);

        $this->assertEquals('Gatsby', $book->short_title);
    }
}
