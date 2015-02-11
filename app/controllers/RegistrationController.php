<?php

use Aidph\Helpers\UserHelperTrait;
use Aidph\Registration\RegisterUserCommand;
use Aidph\Validators\UserValidator;
use Laracasts\Commander\CommanderTrait;
use Sorskod\Larasponse\Larasponse;

class RegistrationController extends ApiController {

    use CommanderTrait, UserHelperTrait;

    protected $validator;

    function __construct(UserValidator $validator, Larasponse $fractal)
    {
        $this->validator = $validator;

        parent::__construct($fractal);
    }

    /**
	 * Store a newly created resource in storage.
	 * POST /registration
	 *
	 * @return Response
	 */
	public function register()
	{
        /* Generate Username based on email
            Generate also random confirmation code as password
            to be confirmed by the users email
         */
        $input['username'] = static::generateUserNameFromEmail(Input::get('email'));
        $input['password'] = str_random(30);

        Input::merge($input);

        if ( $this->validator->isValid(Input::all()) ) {

            Log::info('Validation Success');

            Log::info('Input: ' . print_r(Input::all(), true));

            $user = $this->execute(RegisterUserCommand::class);

            return $this->respondCreated('User successfully created', $user->id);

        } else {

            Log::error('Validation Failed');
            return $this->respondValidationFailed($this->validator->getErrors());

        }
    }

    /**
     * Verify User From Email
     * with confirmation code
     *
     */
    public function verify( $confirmation_code ){
        dd($confirmation_code);
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