<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

abstract class  MasterSeeder extends Seeder {

    protected $faker;

    function __construct(Faker $faker)
    {
        $this->faker = Faker::create();
    }

    public abstract function createSlug();

}

