<?php

use Aidph\Helpers\AreaQueryHelperTrait;

class Area extends \Eloquent {

    use AreaQueryHelperTrait;

    static $area_type = ['NATIONAL', 'REGION','PROVINCE', 'CITY', 'BRGY'];
    /**
     * @var array
     */
    protected $fillable = ['parent_id', 'name', 'type', 'contact_person',
                            'contact_no', 'latlng', 'bounds', 'status', 'recstat'];

    /*
     * For Self Join
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('User');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    /**
     * @return mixed
     */
    public function infras()
    {
        return $this->hasMany('Infrastructure', 'brgy_area_id');
    }

    public function household()
    {
        return $this->hasMany('Household', 'brgy_area_id');
    }


    public static function getAreasForLoggedUser($userId)
    {
        $user = User::with('Area')->get()->find($userId);
        $notAllLevel = true;

        return Area::getAreaAndChildren($user->area, $notAllLevel);
    }


}