<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 10; $i > 0; $i--) {
            DB::table('tags')->insert([
                'title' => Str::random(10)
            ]);
        }
    }
}
