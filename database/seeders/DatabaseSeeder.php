<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;


    public function run(): void
    {

        $authors = [
            ['name' => 'Abai Kunanbaev', 'email' => 'abai@test.com'],
            ['name' => 'Mukhtar Auezov', 'email' => 'mukhtar@test.com'],
            ['name' => 'Aray Yessengeldiyeva', 'email' => 'aray@test.com'],
        ];

        foreach ($authors as $data) {
            $author = \App\Models\Author::create($data);


            $author->books()->createMany([
                ['title' => 'First Book of ' . $author->name, 'description' => 'Interesting story'],
                ['title' => 'Second Book of ' . $author->name, 'description' => 'Classic literature'],
            ]);
        }
    }
}
