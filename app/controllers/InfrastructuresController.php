<?php

use Aidph\Transformers\InfrastructureTransformer;

class InfrastructuresController extends ApiController {

    protected $infraTransformer;

    function __construct(InfrastructureTransformer $infraTransformer)
    {
        $this->infraTransformer = $infraTransformer;

        $this->beforeFilter('auth.basic', ['on' => 'post']);
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $infras = Infrastructure::all();

        return $this->respond([
            'data' => $this->infraTransformer->transformCollection( $infras->all() )
        ]);
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
		//
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
        return $this->respond([
            'data' => $this->infraTransformer->transform($infra)
        ]);
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
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
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
