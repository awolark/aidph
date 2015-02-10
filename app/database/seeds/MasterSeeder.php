<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

abstract class  MasterSeeder extends Seeder {

    protected $faker;
    protected $csv_base_path;

    function __construct(Faker $faker)
    {
        $this->csv_base_path = __DIR__ . '/../csv/';
        $this->faker = Faker::create();
    }

    public abstract function createSlug();

    public abstract function csvData();

}

