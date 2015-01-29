<?php

class SessionsController extends ApiController {

    static $rules = array(
        'username'    => 'required',
        'password' => 'required'
    );

    /**
	 * Log in a user
	 * POST /auth/login
	 *
	 * @return Response
	 */
	public function store()
	{

        if(Auth::attempt(array('username' => Input::json('username'), 'password' => Input::json('password'))))
        {
            return $this->respond(Auth::user());
        } else {
            return $this->respondAuthenticationFailed();
        }
	}

    /**
     * Log out a user
     * DELETE /logout
     *
     * @return Response
     */
    public function destroy()
    {
        Auth::logout();
        return $this->respond(array('flash' => 'Logged Out!'));
    }
}