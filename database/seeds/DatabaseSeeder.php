<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'deposit_amount' => 500,
            'user_role' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'Customer',
            'email' => 'customer@gmail.com',
            'password' => bcrypt('12345678'),
            'deposit_amount' => 50000,
            'user_role' => 2,
        ]);
    }
}
