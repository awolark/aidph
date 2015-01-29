<?php

use Laracasts\Commander\CommanderTrait;

class RegistrationController extends \BaseController {

    use CommanderTrait;


    /**
     * Verify User From Email
     * with confirmation code
     *
     */
    public function verify( $confirmation_code ){
        dd($confirmation_code);
    }

	/**
	 * Store a newly created resource in storage.
	 * POST /registration
	 *
	 * @return Response
	 */
	public function store()
	{
		//TODO registrationForm Validation
        // ex: $this->registrationForm->validate(Input::all());

        //$this->execute(RegisterUserCommand::class);
        //Auth:login( $user );

        //flash message 'You are now registered!'

        //return Redirect::home();
	}

	/**
	 * Display the specified resource.
	 * GET /registration/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /registration/{id}/edit
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
	 * PUT /registration/{id}
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
	 * DELETE /registration/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}