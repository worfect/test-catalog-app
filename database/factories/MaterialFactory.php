<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MaterialFactory extends Factory
{

    public function definition(): array
    {
        return [
            'title' => $this->faker->text(20),
            'description' => $this->faker->realText(100),
            'type_id' => rand(1,5),
            'category_id' => rand(1,9),
        ];
    }
}
