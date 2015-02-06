<?php

class Infrastructure extends \Eloquent {

    static $infra_types = ['BRIDGE', 'BUILDING', 'DAM'];

    protected $fillable = ['name', 'brgy_area_id', 'type', 'location', 'remarks', 'status', 'recstat'];

    public function area()
    {
        return $this->belongsTo('Area', 'brgy_area_id', 'id');
    }
}