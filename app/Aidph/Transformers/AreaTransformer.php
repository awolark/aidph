<?php namespace Aidph\Transformers;

use Area;
use League\Fractal\TransformerAbstract;

class AreaTransformer extends TransformerAbstract {

    /**
     * @param Area $area
     * @return array
     */
    public function transform(Area $area)
    {
        return [
            'id' => $area['id'],
            'area_name' => $area['name'],
            'area_type' => $area['type'],
            'contact_person' => $area['contact_person'],
            'contact_no' => $area['contact_no'],
            'coords' => $area['latlng'],
            'borders' => $area['bounds'],
            'parent_area' => (int) $area['parent_id'],
            'org_chart' => $area['org_chart_path'],
            'status' => $area['status']
        ];
    }
}