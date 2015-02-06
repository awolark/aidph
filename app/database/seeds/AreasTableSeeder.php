<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AreasTableSeeder extends Seeder {



    public function run()
	{
		$faker = Faker::create();


        $area_type =  Area::$area_type;

		foreach(range(1, 50) as $index)
		{
            $parent_ids = Area::lists('id');
			Area::create([
                'name' => $faker->city,
                'parent_id' => $faker->randomElement($parent_ids),
                'type' => $area_type[ rand(0,4) ],
                'contact_person' => $faker->name,
                'contact_no' => $faker->phoneNumber,
                'latlng' => $faker->latitude . ', ' . $faker->longitude,
                'status' => 'OK'
			]);
		}
	}


}