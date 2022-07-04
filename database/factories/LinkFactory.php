<?php

namespace Database\Factories;

class LinkFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{
    public function definition(): array
    {
        return [
            'url' => $this->faker->url(),
            'title' => $this->faker->text(40),
            'material_id' => rand(1,30),
        ];
    }
}
