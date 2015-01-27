<?php

class Area extends \Eloquent {

    static $area_type = ['NATIONAL', 'REGION','PROVINCE', 'CITY', 'BRGY'];
    /**
     * @var array
     */
    protected $fillable = ['parent_id', 'name', 'type', 'contact_person',
                            'contact_no', 'latlng', 'bounds', 'org_chart_path',
                            'status', 'recstat'];

    /**
     * @return mixed
     */
    public function infras()
    {
        return $this->hasMany('Infrastructure', 'brgy_area_id');
    }
}