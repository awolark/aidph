<?php

use Aidph\Helpers\AreaQueryHelperTrait;
use Aidph\Registration\Events\UserHasCreated;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Laracasts\Commander\Events\EventGenerator;

class User extends Eloquent implements UserInterface{

	use UserTrait, EventGenerator;

    protected $fillable = array('area_id', 'username', 'password', 'email', 'role');
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

    public function areas()
    {
        return $this->belongsToMany('Area');
    }


    /**
     * @param $area_id
     * @param $username
     * @param $email
     * @param $role
     * @return static
     */
    public static function register($area_id, $username, $email, $role)
    {
        $user = new static(compact('area_id', 'username', 'email', 'role'));

        //raise an event
        $user->raise(new UserHasCreated($user));

        return $user;
    }



}
