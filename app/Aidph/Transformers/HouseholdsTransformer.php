<?php  namespace Aidph\Transformers; 

class HouseholdsTransformer extends Transformer {

    public function  transform($item)
    {
        return [
            'referenceId' => $item['id'],
            'brgy_area_id' => $item['brgy_area_id'],
            'brgy_name' => $item->area->name,
            'head_pers_id' => $item['head_pers_id'],
            'head_name' => (($item->person)? $item->person->name:''),
            'address' => $item['address'],
            'latlng' => $item['latlng'],
            'bounds' => $item['bounds'],
            'status' => $item['status'],
            'created_at' => date($item['created_at']),
            'updated_at' => date($item['updated_at']),
            'recstat' => $item['recstat']
        ];
    }
}