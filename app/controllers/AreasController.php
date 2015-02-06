<?php

use Aidph\Transformers\AreaTransformer;
use Illuminate\Http\Request;
use Sorskod\Larasponse\Larasponse;

class AreasController extends ApiController {

    protected $fractal;

    function __construct(Larasponse $fractal)
    {
        $this->fractal = $fractal;

//        $this->beforeFilter('auth.basic', ['on' => 'post']);
    }

    /**
	 * Display a listing of the resource.
	 * GET /areas
	 *
	 * @return Response
	 */
	public function index()
    {
        $limit = Input::get('limit') ? Input::get('limit') : $this->default_item_limit;

        if($limit > $this->default_item_limit) { $limit = $this->default_item_limit; }

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

        $area = Area::create(Input::only('name', 'type', 'contact_person', 'contact_no', 'status'));

        return $this->respondCreated('Area successfully created', $area->id );
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
            return $this->respondNotFound('Area does not exist.');
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
     * @param $id
     */
    public function postUpdate($id)
    {
        $area = Area::findOrFail($id);

        $params = Input::all();

        $area->name = $params['name'];
        $area->type = $params['type'];
        $area->contact_person = $params['contact_person'];
        $area->contact_no = $params['contact_no'];
        //  $parent_id = $params['parent_id'];
        $area->status = $params['status'];
        $area->save();

        Log::info('post update ');
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
		$area = Area::findOrFail($id);
        $area->delete();
	}

    public function getBrgys()
    {
        return Area::where('type', '=', 'BRGY')->orderBy('name')->get(array('id','name'));
    }


    /* Query Scopes */

//    public function scopeBrgys($query)
//    {
//        return $query->where('type', '=', 'BRGY');
//    }


}