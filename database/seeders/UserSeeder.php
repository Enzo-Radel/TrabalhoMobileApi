<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::firstOrCreate([
            'name'  => 'Ususario 1',
            'email' => 'user1@teste.com',
            'password' => bcrypt('pass1'),
        ]);

        User::firstOrCreate([
            'name'  => 'Usuario 2',
            'email' => 'user2@teste.com',
            'password' => bcrypt('pass2'),
        ]);

        User::firstOrCreate([
            'name'  => 'Usuario 3',
            'email' => 'user3@teste.com',
            'password' => bcrypt('pass3'),
        ]);

        User::firstOrCreate([
            'name'  => 'Usuario 4',
            'email' => 'user4@teste.com',
            'password' => bcrypt('pass4'),
        ]);

        User::firstOrCreate([
            'name'  => 'Usuario 5',
            'email' => 'user5@teste.com',
            'password' => bcrypt('pass5'),
        ]);
    }
}
