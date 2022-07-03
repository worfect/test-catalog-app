<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(TypeSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(TagSeeder::class);

        \App\Models\Material::factory(30)->create();
        \App\Models\Link::factory(100)->create();
        \App\Models\Author::factory(10)->create();

        $this->call(RelationsSeeder::class);
    }
}
