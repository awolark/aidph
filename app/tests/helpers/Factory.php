<?php

trait Factory {


    protected $times = 1;

    /**
     * Make a new record in the DB
     *
     * @param $type
     * @param array $fields
     * @throws BadMethodCallException
     */
    protected function make($type, array $fields = [])
    {
        while( $this->times-- )
        {
            $stub = array_merge($this->getStub(), $fields);

            $type::create($stub);
        }
    }

    /**
     * @throws BadMethodCallException
     */
    protected function getStub()
    {
        throw new BadMethodCallException('Create your own getStub method to declare your fields.');
    }


} 