<?php  namespace Aidph\Transformers; 

class InfrastructureTransformer extends Transformer {

    public function transform($infra)
    {
        return [
            'referenceId' => $infra['id'],
            'name' => $infra['name'],
            'type' => $infra['type'],
            'location' => $infra['location'],
            'latlng' => $infra['latlng'],
            'remarks' => $infra['remarks'],
            'status' => $infra['status'],
            'brgy_area_id' => $infra['brgy_area_id'],
            'brgy_name' => $infra->area->name,
            'created_at' => date($infra['created_at']),
            'updated_at' => date($infra['updated_at']),
            'recstat' => $infra['recstat']
        ];
    }

} 