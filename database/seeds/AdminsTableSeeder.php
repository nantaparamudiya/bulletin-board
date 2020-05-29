<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('admins')->insert([
    		'username' => 'admin',
        	'password' => '$2y$10$FRqkllmVXISWpygH0CPZouVQ75M121cLQG30u0qQyWtrjnlgN/DNu', // admin123
    	]);
    }
}
