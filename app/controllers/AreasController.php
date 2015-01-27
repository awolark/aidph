<?php

use Aidph\Transformers\AreaTransformer;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\DataArraySerializer;
use League\Fractal\Serializer\JsonApiSerializer;
use Sorskod\Larasponse\Larasponse;

class AreasController extends ApiController {

    protected $fractal;

    function __construct(Larasponse $fractal)
    {
        $this->fractal = $fractal;

        $this->beforeFilter('auth.basic', ['on' => 'post']);
    }

    /**
	 * Display a listing of the resource.
	 * GET /areas
	 *
	 * @return Response
	 */
	public function index()
    {
        $default_limit = ApiController::PAGINATOR_ITEM_LIMIT;

        $limit = Input::get('limit') ? : $default_limit;
        if($limit > $default_limit) { $limit = $default_limit; }

        $areas = Area::paginate($limit);

        return $this->respondWithPagination($areas, new AreaTransformer());
    }

	/**
	 * Show the form for creating a new resource.
	 * GET /areas/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /areas
	 *
	 * @return Response
	 */
	public function store()
	{

		if( ! Input::get('name') or ! Input::get('type') )
        {
            return $this->respondValidationFailed('Parameters failed validation for area');
        }

        Area::create(Input::all());

        return $this->respondCreated('Area successfully created.');
    }

	/**
	 * Display the specified resource.
	 * GET /areas/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $area = Area::find($id);

        if( ! $area){
            return $this->respondNotFound('Lesson does not exist.');
        }

        return $this->respondWithItem($area, new AreaTransformer());
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /areas/{id}/edit
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
	 * PUT /areas/{id}
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
	 * DELETE /areas/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}