<?php

use Aidph\Transformers\AreaTransformer;
use Aidph\Services\AreaCreatorService;
use Sorskod\Larasponse\Larasponse;

class AreasController extends ApiController {

    protected $areaCreator;

    function __construct(Larasponse $fractal, AreaCreatorService $areaCreator)
    {
        $this->areaCreator = $areaCreator;

        parent::__construct($fractal);
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
        }
        catch ( Aidph\Validators\ValidationException $e )
        {
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
	 * Update the specified resource in storage.
	 * PUT /areas/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
<<<<<<< HEAD
        $area = Area::findOrFail($id);

		// $area->save(Input::all());
		return Response::json(Input::all(), 200);

        // $area->save(Input::all());
//        $params = Input::all();
=======
        $area = Area::find($id);
>>>>>>> backup-2-10-15

        $params = Input::all();

        $area->name = $params['name'];
        $area->type = $params['type'];
        $area->contact_person = $params['contact_person'];
        $area->contact_no = $params['contact_no'];
        //  $parent_id = $params['parent_id'];
        $area->status = $params['status'];
        $area->save();
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


//        Log::info('post update ');
    }

	/**
	 * Remove the specified resource from storage.
	 * DELETE /areas/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id = null)
	{
        Log::info('Delete id: '.$id);
		$area = Area::findOrFail($id);
        $area->delete();
	}

    /**
     * Get all barangay areas
     * with their id and name only
     *
     * @return mixed
     */
    public function getBrgys()
    {
        return Area::where('type', '=', 'BRGY')->orderBy('name')->get(array('id','name'));
    }


<<<<<<< HEAD
    /* Query Scopes */

//    public function scopeBrgys($query)
//    {
//        return $query->where('type', '=', 'BRGY');
//    }


}
=======
}
>>>>>>> backup-2-10-15
