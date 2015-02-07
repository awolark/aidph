<?php


class HouseholdsTableSeeder extends MasterSeeder {

    private $brgy_area_list;

    public function run()
	{
        $this->brgy_area_list = Area::where('type', '=', 'BRGY')->lists('id');

        foreach(range(1, 50) as $index)
		{
			Household::create( $this->createSlug() );
		}
	}

    public function createSlug()
    {
        return
            [
                'brgy_area_id' => $this->faker->randomElement($this->brgy_area_list),
                'address' => $this->faker->city,
                'latlng' => $this->faker->latitude . ', ' . $this->faker->longitude,
                'status' => 'OK'
            ];
    }
}