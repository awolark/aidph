<?php  namespace Aidph\Transformers; 

class HouseholdsTransformer extends Transformer {

    public function  transform($item)
    {
        return [
            'referenceId' => $item['id'],
            'brgy_area_id' => $item['brgy_area_id'],
            'head_pers_id' => $item['head_pers_id'],
            'address' => $item['latlng'],
            'bounds' => $item['bounds'],
            'status' => $item['status'],
            'created_at' => date($item['created_at']),
            'updated_at' => date($item['updated_at']),
            'recstat' => $item['recstat']
        ];
    }
}