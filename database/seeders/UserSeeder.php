<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'wadhah azizi',
            'email' => 'wadhah@infowadhahschool.com',
            'password' => bcrypt('1234'),
        ]);

        // or generate fake users with a factory
        User::factory(10)->create();
    }
}
