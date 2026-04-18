<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Author;

class AuthorFeatureTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_author_can_be_created()
    {
        // 1. Отправляем запрос на создание автора
        $response = $this->post('/authors', [
            'name' => 'Jane',
            'surname' => 'Austen',
            'birthdate' => '1775-12-16',
        ]);

        // 2. Проверяем, что нас перенаправили (статус 302)
        $response->assertStatus(302);

        // 3. Проверяем, что автор реально записался в базу данных
        $this->assertDatabaseHas('authors', [
            'name' => 'Jane',
            'surname' => 'Austen'
        ]);
    }
}
