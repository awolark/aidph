<?php

use Aidph\Helpers\UserHelperTrait;
use Aidph\Helpers\UserQueryHelperTrait;
use Aidph\Validators\UserValidator;
use Laracasts\Commander\CommanderTrait;
use Aidph\Transformers\UserTransformer;
use Sorskod\Larasponse\Larasponse;

class UsersController extends ApiController {

    use CommanderTrait, UserHelperTrait, UserQueryHelperTrait;

    protected $validator;

    function __construct(UserValidator $validator, Larasponse $fractal)
    {
        $this->validator = $validator;

        parent::__construct($fractal);
    }


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

        if ( $limit > $this->default_item_limit ) { $limit = $this->default_item_limit; }

        $users = $this->getUsersOfLoggedUser($loggedUserId, $limit);

        return $this->respondWithPagination($users, new UserTransformer());
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
        Log::info('Delete id: ' . $id);
        $user = User::findOrFail($id);
        $user->delete();
	}


}