<?php  namespace Aidph\Transformers; 

class InfrastructureTransformer extends Transformer {

    public function transform($infra)
    {
        return [
            'id' => $infra['id'],
            'name' => $infra['name'],
            'type' => $infra['type'],
            'location' => $infra['location'],
            'coords' => $infra['latlng'],
            'remarks' => $infra['remarks'],
            'status' => $infra['status'],
            'brgy_area_id' => $infra['brgy_area_id'],
            'brgy_name' => $infra->area->name,
            'recstat' => $infra['recstat']
        ];
    }

} 