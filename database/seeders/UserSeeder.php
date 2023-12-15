<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'ali zeinodin',
            'email' => 'alizeinodin79@gmail.com',
            'phone' => '09336011398',
            'password' => bcrypt('11111111'),
            'credit' => 50000
        ]);
    }
}
