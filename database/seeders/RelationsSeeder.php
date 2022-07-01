<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RelationsSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 30; $i > 0; $i--) {
            DB::table('material_type')->insert([
                'material_id' => $i,
                'type_id' => random_int(1, 10),
            ]);

            DB::table('category_material')->insert([
                'material_id' => $i,
                'category_id' => random_int(1, 10),
            ]);

            DB::table('material_tag')->insert([
                'material_id' => $i,
                'tag_id' => random_int(1, 10),
            ]);
        }
    }
}
