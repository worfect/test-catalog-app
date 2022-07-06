<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

final class LinkFactory extends Factory
{
    public function definition(): array
    {
        return [
            'url' => $this->faker->url(),
            'title' => $this->faker->text(40),
            'material_id' => rand(1, 30),
        ];
    }
}
