<?php

class UsersTableSeeder extends MasterSeeder
{

    protected $area_ids;

    protected $roles;

    protected $recstats;


    public function run()
    {
        $this->area_ids = Area::lists('id');
        $this->roles = [1, 2];
        $this->recstats = ['A', 'I', 'X'];

        // create first admin account
        User::create([
            'area_id' => 1,
            'username' => 'admin',
            'password' => Hash::make('1234'),
            'email' => 'ndrrmc.aidph@gmail.com',
            'role' => 1
        ]);

        foreach ( range(1, 50) as $index ) {
            User::create($this->createSlug());
        }
    }

    public function createSlug()
    {
        return [
            'area_id' => $this->faker->randomElement($this->area_ids),
            'username' => $this->faker->userName . $this->faker->randomElement($this->area_ids),
            'password' => Hash::make('1234'),
            'email' => $this->faker->email,
            'role' => $this->roles[rand(0, 1)],
            'image_path' => 'images/icon-user-default.png',
            'recstat' => $this->recstats[rand(0, 2)]
        ];
    }

    public function csvData()
    {
        // TODO: Implement csvData() method.
    }

}