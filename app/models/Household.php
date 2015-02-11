<?php

class Household extends \Eloquent {

    protected $fillable = ['brgy_area_id', 'head_pers_id', 'address', 'latlng',
                           'bounds', 'status', 'recstat'];

    public function area()
    {
        return $this->belongsTo('Area', 'brgy_area_id');
    }

    public function person()
    {
        return $this->belongsTo('Person', 'head_pers_id');
    }
}