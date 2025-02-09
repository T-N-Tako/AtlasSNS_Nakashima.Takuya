<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Atlas一郎',
                'email' => 'atlas1@example.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Atlas二郎',
                'email' => 'atlas2@example.com',
                'password' => Hash::make('password456'),
            ],
        ]);

        echo "UsersTableSeeder executed successfully.\n";
    }
}
