<?php 

use Faker\Factory as Faker;

abstract class ApiTester extends TestCase{

    /**
     * @var \Faker\Generator
     */
    protected $fake;

    /**
     * Initialize faker
     */
    function __construct()
    {
        $this->fake = Faker::create();
    }

    /**
     * Default preparation for each test
      */
    public function setUp()
    {
        parent::setUp();

        $this->prepareForTests();
    }

    /**
     * Migrates the database and set the mailer to 'pretend'.
     * This will cause the tests to run quickly.
     *
     */
    private function prepareForTests()
    {
        Artisan::call('migrate');
        Mail::pretend(true);
    }

    protected function times($count)
    {
        $this->times = $count;

        return $this;
    }

    /**
     * Get JSON output from API
     *
     * @param $uri
     * @param string $method
     * @param array $parameters
     * @return mixed
     */
    protected function getJson($uri, $method = 'GET', $parameters = [])
    {
        return json_decode($this->call($method, $uri, $parameters)->getContent());
    }



    protected function assertObjectHasAttributes()
    {
        $args = func_get_args();
        $object = array_shift($args);
        foreach ( $args as $attribute ) {
            $this->assertObjectHasAttribute($attribute, $object);
        }
    }

} 