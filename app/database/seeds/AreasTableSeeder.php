<?php

use Faker\Factory as Faker;
class AreasTableSeeder extends MasterSeeder {

    private $area_type;
    private $parent_ids;

    public function run()
	{
        $this->area_type = Area::$area_type;
        $this->parent_ids = Area::lists('id');

        foreach(range(1, 50) as $index)
		{
			Area::create( $this->createSlug() );
		}
	}

    public function createSlug()
    {
        return [
            'name' => $this->faker->city,
            'parent_id' => $this->faker->randomElement($this->parent_ids),
            'type' => $this->area_type[rand(0, 4)],
            'contact_person' => $this->faker->name,
            'contact_no' => $this->faker->phoneNumber,
            'latlng' => $this->faker->latitude . ', ' . $this->faker->longitude,
            'status' => 'OK'
        ];
    }
}