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
            'referenceId' => $area['id'],
            'parent_id' => (int) $area['parent_id'],
            'name' => $area['name'],
            'type' => $area['type'],
            'contact_person' => $area['contact_person'],
            'contact_no' => $area['contact_no'],
            'latlng' => $area['latlng'],
            'bounds' => $area['bounds'],
            'status' => $area['status'],
            'recstat' => $area['recstat'],
            'created_at' => date($area['created_at']),
            'updated_at' => date($area['updated_at'])
        ];
    }
}