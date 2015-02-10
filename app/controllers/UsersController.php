<?php

use Aidph\Transformers\UserTransformer;

class UsersController extends ApiController {

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
        $loggedUserId = Input::get('loggedUserId');

        $limit = Input::get('limit') ? Input::get('limit') : $this->default_item_limit;

        if ( $limit > $this->default_item_limit ) {
            $limit = $this->default_item_limit;
        }

        $users = User::where('id','!=',$loggedUserId)
                ->orderBy('recstat','asc')
                ->paginate($limit);

        return $this->respondWithPagination($users, new UserTransformer());
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
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
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    public function getLoggedUserAreas($id)
    {
        $user = DB::select(DB::raw("SELECT "));
//        Log::info(print_r($user, true));
    }

}