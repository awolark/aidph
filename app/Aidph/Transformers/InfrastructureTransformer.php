<?php  namespace Aidph\Transformers; 

class InfrastructureTransformer extends Transformer {

    public function transform($infra)
    {
        return [
            'brgy_id' => $infra['brgy_area_id'],
            'name' => $infra['name'],
            'type' => $infra['type'],
            'location' => $infra['location'],
            'coords' => $infra['latlng'],
            'remarks' => $infra['remarks'],
            'status' => $infra['status'],
            'recstat' => $infra['recstat']
        ];
    }

} 