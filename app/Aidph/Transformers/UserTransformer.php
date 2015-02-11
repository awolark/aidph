<?php  namespace Aidph\Transformers;

use League\Fractal\TransformerAbstract;
use User;

class UserTransformer extends TransformerAbstract {

    public function  transform(User $item)
    {
        return [
            'referenceId' => $item['id'],
            'area_id' => (int) $item['area_id'],
            'area_name' => $item->area->name,
            'username' => $item['username'],
            'email' => $item['email'],
            'role' => (int) $item['role'],
            'gcm_regid' => $item['gcm_regid'],
            'image_path' => $item['image_path'],
            'created_at' => date($item['created_at']),
            'updated_at' => date($item['updated_at']),
            'recstat' => $item['recstat']
        ];
    }
}