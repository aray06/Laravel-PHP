<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Создаем 3 авторов
        $authors = [
            ['name' => 'Abai Kunanbaev', 'email' => 'abai@test.com'],
            ['name' => 'Mukhtar Auezov', 'email' => 'mukhtar@test.com'],
            ['name' => 'Aray Yessengeldiyeva', 'email' => 'aray@test.com'],
        ];

        foreach ($authors as $data) {
            $author = \App\Models\Author::create($data);

            // Добавляем по 2 книги каждому
            $author->books()->createMany([
                ['title' => 'First Book of ' . $author->name, 'description' => 'Interesting story'],
                ['title' => 'Second Book of ' . $author->name, 'description' => 'Classic literature'],
            ]);
        }
    }
}
