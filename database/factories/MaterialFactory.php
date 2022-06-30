<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MaterialFactory extends Factory
{

    public function definition(): array
    {
        return [
            'title' => $this->faker->text(20),
            'author' => $this->faker->name(),
            'description' => $this->faker->realText(100),
        ];
    }
}
