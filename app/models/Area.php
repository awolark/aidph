<?php

class Area extends \Eloquent {

    static $area_type = ['NATIONAL', 'REGION','PROVINCE', 'CITY', 'BRGY'];
    /**
     * @var array
     */
    protected $fillable = ['parent_id', 'name', 'type', 'contact_person',
                            'contact_no', 'latlng', 'bounds', 'status', 'recstat'];

    /**
     * @return mixed
     */
    public function infras()
    {
        return $this->hasMany('Infrastructure', 'brgy_area_id');
    }

    public function users()
    {
        return $this->belongsToMany('User');
    }

//    public function parent()
//    {
//        return $this->hasOne('Area', 'id', 'parent_id');
//    }
}