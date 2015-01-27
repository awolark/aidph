<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class InfrastructuresTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        $infra_types = Infrastructure::$infra_types;
        $brgy_area_list = Area::where('type','=','BRGY')->lists('id');

		foreach(range(1, 100) as $index)
		{
			Infrastructure::create([
                'brgy_area_id' => $faker->randomElement($brgy_area_list),
                'name' => $faker->city,
                'type' => $faker->randomElement($infra_types),
                'location' => $faker->address,
                'latlng' => $faker->latitude + ', ' + $faker->longitude,
                'remarks' => $faker->paragraph(),
                'status' => 'OK'
			]);
		}
	}

}