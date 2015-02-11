<?php

class InfrastructuresTableSeeder extends MasterSeeder {

    private $infra_types;
    private $brgy_area_list;

    public function run()
	{
        $this->brgy_area_list = Area::where('type', '=', 'BRGY')->lists('id');
        $this->infra_types = Infrastructure::$infra_types;

		foreach(range(1, 100) as $index)
		{
			Infrastructure::create( $this->createSlug() );
		}
	}

    /**
     * @return array
     */
    public function createSlug()
    {
        return
            [
                'brgy_area_id' => $this->faker->randomElement($this->brgy_area_list),
                'name' => $this->faker->city,
                'type' => $this->faker->randomElement($this->infra_types),
                'location' => $this->faker->address,
                'latlng' => $this->faker->latitude . ', ' . $this->faker->longitude,
                'remarks' => $this->faker->paragraph(),
                'status' => 'OK'
            ];
    }

    public function csvData()
    {
        // TODO: Implement csvData() method.
    }
}