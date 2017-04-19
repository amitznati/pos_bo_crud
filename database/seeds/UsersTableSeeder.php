<?php

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
        \DB::table('users')->delete();
        
        DB::table('users')->insert([
            'name'       => 'Amit Znati',
            'email'  	 => 'amitznati@gmail.com',
            'password'   => '$2y$10$bxsTsV/B89NXzZ8EaHvnYubq9/e7p/NLiCpLacRyG7SC806l6hmeu',
        ]);
    }
}
