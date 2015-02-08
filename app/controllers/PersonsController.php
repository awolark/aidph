<?php

use Sorskod\Larasponse\Larasponse;
use Aidph\Transformers\PersonsTransformer;

class PersonsController extends ApiController {


    protected $fractal;

    /**
     * @param Larasponse $fractal
     */
    function __construct(Larasponse $fractal)
    {
        $this->fractal = $fractal;
    }

    /**
	 * Display a listing of the resource.
	 * GET /persons
	 *
	 * @return Response
	 */
	public function index()
	{
        $limit = Input::get('limit') ? : $this->default_item_limit;

        if ( $limit > $this->default_item_limit ) {
            $limit = $this->default_item_limit;
        }

        $persons = Person::paginate($limit);

        return $this->respondWithPagination($persons, new PersonsTransformer());
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /persons/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /persons
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /persons/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /persons/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /persons/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /persons/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}