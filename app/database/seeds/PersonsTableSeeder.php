<?php


class PersonsTableSeeder extends MasterSeeder{

    private $households;
    private $parent_ids;
    private $genders;

	public function run()
	{

        $this->genders = ['MALE', 'FEMALE'];

        foreach(range(1, 100) as $index)
		{
            $this->parent_ids = Area::lists('id');

            Person::create( $this->createSlug() );
		}
	}

    public function createSlug()
    {
        $this->households = Household::lists('id');
        $this->parent_ids = Person::lists('id');
       return [
            'hh_id' => $this->faker->randomElement($this->households),
            'parent_id' => $this->faker->randomElement($this->parent_ids),
            'f_name' => $this->faker->firstName,
            'l_name' => $this->faker->lastName,
            'm_name' => $this->faker->lastName,
            'address' => $this->faker->address,
            'sex' => $this->genders[rand(0,1)],
            'contact_no' => $this->faker->phoneNumber,
            'occupation' => $this->faker->companySuffix,
            'status' => 'OK'
        ];
    }

    public function csvData()
    {
        // TODO: Implement csvData() method.
    }
}