<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
        User::create([
            'area_id' => 26,
            'username' => 'admin',
            'password' => Hash::make('1234'),
            'email' => 'waynearila@gmail.com',
            'role' => 1
        ]);
	}

}