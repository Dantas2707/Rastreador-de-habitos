<?php

namespace Database\Seeders;

use App\Models\Habit;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Gabriel',
            'email' => 'teste@email.com',
            'password' => '123456',
        ]);

        Habit::factory(4)->create();
    }
}