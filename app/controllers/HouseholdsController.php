<?php

use Aidph\Transformers\HouseholdsTransformer;
use Sorskod\Larasponse\Larasponse;

class HouseholdsController extends ApiController {

    protected $fractal;

    function __construct(Larasponse $fractal)
    {
        $this->fractal = $fractal;

//        $this->beforeFilter('auth.basic', ['on' => 'post']);
    }

	/**
	 * Display a listing of the resource.
	 * GET /households
	 *
	 * @return Response
	 */
	public function index()
	{
        $loggedUserId = Input::get('loggedUserId');

        $limit = Input::get('limit') ? : $this->default_item_limit;

        if ( $limit > $this->default_item_limit ) {  $limit = $this->default_item_limit;  }

        $areaIds = Area::getAreaIdsForUser($loggedUserId, '', true);

        $households = Household::whereIn('brgy_area_id', $areaIds)
            ->with('area')
            ->with('person')
            ->orderBy('recstat', 'asc')
            ->paginate($limit);

//        $households = Household::paginate($limit);

        return $this->respondWithPagination($households, new HouseholdsTransformer());
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /households/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /households
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /households/{id}
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
	 * GET /households/{id}/edit
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
	 * PUT /households/{id}
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
	 * DELETE /households/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}