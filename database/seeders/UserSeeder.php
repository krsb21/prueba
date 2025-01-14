<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Carlos Sánchez',
                'email' => 'email1@mail.com',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Juan Pérez',
                'email' => 'email2@mail.com',
                'password' => bcrypt('password')
            ]
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
