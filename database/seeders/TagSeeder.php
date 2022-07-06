<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 10; $i > 0; $i--) {
            DB::table('tags')->insert([
                'title' => $faker->word()
            ]);
        }
    }
}
