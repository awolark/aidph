<?php

class UsersTableSeeder extends MasterSeeder {

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

    public function createSlug()
    {
        // TODO: Implement createSlug() method.
    }
}