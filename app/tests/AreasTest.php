<?php

class AreasTest extends ApiTester {

    use Factory;

    /** @test */
    public function it_fetches_areas()
    {
        $this->times(3)->make('Area', ['name' => 'Mabolo']);

        $this->getJson('api/areas');

        $this->assertResponseOk();
    }

    /** @test */
    public function it_fetches_a_single_area()
    {
        $this->make('Area');

        $area = $this->getJson('api/areas/1')->data;

        $this->assertResponseOk();

        $this->assertObjectHasAttributes(
            $area,
            'area_name',
            'area_type',
            'contact_person',
            'contact_no',
            'coords',
            'parent_area',
            'org_chart',
            'status'
        );
    }
    
    /** @test */
    public function it_404s_if_a_lesson_is_not_found()
    {
        $json = $this->getJson('api/areas/x');

        $this->assertResponseStatus(404);

        $this->assertObjectHasAttributes($json, 'error');
    }
    
    /** @test */
    public function it_creates_a_new_area_given_valid_parameters()
    {
        $this->getJson('api/areas', 'POST', $this->getStub());

        $this->assertResponseStatus(201);
    }

    /** @test */
    public function it_throws_a_422_if_a_new_lesson_request_fails_validation()
    {
        $this->getJson('api/areas', 'POST');

        $this->assertResponseStatus(422);

    }
    
    protected  function getStub()
    {
        $area_type = Area::$area_type;
        $parent_ids = Area::lists('id');

        return [
         'name' => $this->fake->city,
         'parent_id' => $this->fake->randomElement($parent_ids),
         'type' => $area_type[ rand(0,4) ],
         'contact_person' => $this->fake->name,
         'contact_no' => $this->fake->phoneNumber,
         'latlng' => $this->fake->latitude + ', ' + $this->fake->longitude,
         'status' => 'OK'
     ];
    }



}
