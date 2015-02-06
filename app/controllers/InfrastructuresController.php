<?php


use Aidph\Transformers\InfrastructureTransformer;
use Sorskod\Larasponse\Larasponse;

class InfrastructuresController extends ApiController {

    protected $fractal;

    function __construct(Larasponse $fractal)
    {
        $this->fractal = $fractal;

//        $this->beforeFilter('auth.basic', ['on' => 'post']);
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $limit = Input::get('limit') ? : $this->default_item_limit;

        if($limit > $this->default_item_limit) { $limit = $this->default_item_limit; }

        $infras = Infrastructure::with('area')->paginate($limit);

        return $this->respondWithPagination($infras, new InfrastructureTransformer());
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        if ( !Input::get('name') or !Input::get('type') ) {
            return $this->respondValidationFailed('Parameters failed validation for infrastructure');
        }

        $infra = Infrastructure::create(Input::only('name', 'brgy_area_id', 'type', 'location', 'remarks', 'status'));

        return $this->respondCreated('Infrastructure successfully created', $infra->id);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function show($id)
    {
        $infra = Infrastructure::find($id);

        if( ! $infra){
            return $this->respondNotFound('Infrastructure does not exist.');
        }

        return $this->respondWithItem($infra, new InfrastructureTransformer());
    }

	/**
	 * Show the form for editing the specified resource.
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
        $infra = Infrastructure::findOrFail($id);

        $params = Input::all();
        $infra->name = $params['name'];
        $infra->brgy_area_id = $params['brgy_area_id'];
        $infra->type = $params['type'];
        $infra->location = $params['location'];
        $infra->remarks = $params['remarks'];
        $infra->status = $params['status'];
        $infra->save();

        Log::info('post update ');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $infra = Infrastructure::findOrFail($id);
        $infra->delete();
	}

    /**
     * @param null $areaId
     * @return mixed
     */
    public function infras($areaId = null)
    {
        $infras = $this->getInfras($areaId);

        return $this->respond([
            'data' => $this->infraTransformer->transformCollection( $infras->all() )
        ]);
    }

    /**
     * @param $areaId
     * @return \Illuminate\Database\Eloquent\Collection|mixed|static[]
     */
    private function getInfras($areaId)
    {
        return $areaId ? Area::findOrFail($areaId)->infras : Infrastructure::all();
    }


}
