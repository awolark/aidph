<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AreaTableSeeder extends Seeder {



    public function run()
	{
		$faker = Faker::create();

        $area_type = ['NATIONAL', 'REGION','PROVINCE', 'CITY', 'BRGY'];

		foreach(range(1, 10) as $index)
		{
			Area::create([
                'name' => $faker->city,
                'type' => $area_type[ rand(0,4) ],
                'contact_person' => $faker->name,
                'contact_no' => $faker->phoneNumber,
                'latlng' => $faker->latitude + ', ' + $faker->longitude,
                'STATUS' => 'OK'
			]);
		}
	}


}