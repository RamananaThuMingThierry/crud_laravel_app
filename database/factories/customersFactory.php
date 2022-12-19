<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class customersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => fake()->name(),
            'prenom' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}
