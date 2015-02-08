<?php  namespace Aidph\Transformers; 

class PersonsTransformer extends Transformer {

    public function  transform($p)
    {
        return [
            'referenceId' => $p['id'],
            'hh_id' => $p['hh_id'],
            'parent_id' => $p['parent_id'],
            'f_name' => $p['f_name'],
            'l_name' => $p['l_name'],
            'm_name' => $p['m_name'],
            'b_date' => $p['b_date'],
            'address' => $p['address'],
            'sex' => $p['sex'],
            'contact_no' => $p['contact_no'],
            'occupation' => $p['occupation'],
            'pwd' => $p['pwd'],
            'image_path' => $p['image_path'],
            'status' => $p['status'],
            'created_at' => date($p['created_at']),
            'updated_at' => date($p['updated_at']),
            'recstat' => $p['recstat']
        ];
    }
}