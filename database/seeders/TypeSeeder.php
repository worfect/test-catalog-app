<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        $titles = ['Книга', 'Статья', 'Видео', 'Сайт\Блог', 'Подборка', 'Ключевые идеи книги'];

        foreach ($titles as $title) {
            DB::table('types')->insert([
                'title' => $title,
            ]);
        }
    }
}
