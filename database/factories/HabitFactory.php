<?php

namespace Database\Factories;

use App\Models\Habit;
use Illuminate\Database\Eloquent\Factories\Factory;

class HabitFactory extends Factory
{
    public function definition(): array
    {
        $habits = [
            'Ler 10 páginas',
            'Meditar 10 minutos',
            'Beber 2L de água',
            'Estudar programação',
        ];

        return [
            'user_id' => 1,
            'name' => fake()->unique()->randomElement($habits),
        ];
    }
}