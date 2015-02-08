<?php

use Aidph\Transformers\AreaTransformer;
use Aidph\Services\AreaCreatorService;
use Aidph\Validators\ValidationException;
use Sorskod\Larasponse\Larasponse;

class AreasController extends ApiController {

    protected $fractal;
    protected $areaCreator;

    function __construct(Larasponse $fractal, AreaCreatorService $areaCreator)
    {
        $this->areaCreator = $areaCreator;
        $this->fractal = $fractal;
     // $this->beforeFilter('auth.basic', ['on' => 'post']);
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
        try {
            $area = $this->areaCreator->make(Input::all());

            return $this->respondCreated('Area successfully created', $area->id);
        } catch ( Aidph\Validators\ValidationException $e ) {
            return $this->respondValidationFailed($e->getErrors());
        }
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
        $area = Area::findOrFail($id);

        $area->save(Input::all());
//        $params = Input::all();


//        $area->name = $params['name'];
//        $area->type = $params['type'];
//        $area->contact_person = $params['contact_person'];
//        $area->contact_no = $params['contact_no'];
        //  $parent_id = $params['parent_id'];
//        $area->status = $params['status'];
//        $area->save();
    }


    /**
     * @param $id
     */
    public function postUpdate($id)
    {
//        try {
//            $area = $this->areaCreator->update(Input::all(), $id);
//
//            return $this->respondCreated('Area successfully Updated', $area->id);
//        } catch ( ValidationException $e ) {
//            return $this->respondValidationFailed($e->getErrors());
//        }



//        $area = Area::findOrFail($id);
//
//        $params = Input::all();
//
//        $area->name = $params['name'];
//        $area->type = $params['type'];
//        $area->contact_person = $params['contact_person'];
//        $area->contact_no = $params['contact_no'];
//        //  $parent_id = $params['parent_id'];
//        $area->status = $params['status'];
//        $area->save();



//        Log::info('post update ');
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