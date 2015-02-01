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
        if(Auth::once(array('username' => Input::json('username'), 'password' => Input::json('password'))))
        {
            $user = Auth::user();
            $data = array(
                'data' =>
                    array('username' => $user->username,
                          'role' => $user->role,
                          'image_path' => $user->image_path
                    )
            );
            return $this->respond($data);
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

    public function unlock()
    {
        if(Auth::once(array('username' => Input::json('username'), 'password' => Input::json('password'))))
        {
            return $this->respond(array('flash' => 'Unlocked'));
        } else {
            return $this->respondValidationFailed('Invalid Password');
        }
    }

//    public function check()
//    {
//        if(Auth::check())
//        {
//            return $this->respond(array('flash' => 'User is Still Logged In'));
//        }
//        return $this->respondAuthenticationExpired();
//    }
}