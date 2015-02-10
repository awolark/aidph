<?php

use Aidph\Helpers\CsvSeederTrait;
use Faker\Factory as Faker;
class AreasTableSeeder extends MasterSeeder {

    use CsvSeederTrait;

    private $area_type;
    private $parent_ids;
    private $csv_file;

    public function run()
	{
        $this->csv_file = $this->csv_base_path . 'area.csv';
        $csvData = $this->csvData();

        $ctr = 0;
        foreach($csvData as $data) {
            $fakerData = [];
            $areaData = [];

            $fakerData = array(
                'contact_person' => $this->faker->name,
                'contact_no' => $this->faker->phoneNumber
            );

            $areaData = array_merge($data, $fakerData);

            if(is_array($areaData)){
                Area::create($areaData);
            }
            // Log::info(print_r($areaData, true));
        }

//        $this->area_type = Area::$area_type;
//        $this->parent_ids = Area::lists('id');

//        foreach(range(1, 50) as $index)
//		{
//			Area::create( $this->createSlug() );
//		}
	}

    public function csvData()
    {
        return $this->csvToArray($this->csv_file, $this);
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