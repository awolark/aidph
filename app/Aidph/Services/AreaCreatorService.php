<?php namespace Aidph\Services;

use Aidph\Validators\AreaValidator;
use Aidph\Validators\ValidationException;
use Area;

class AreaCreatorService {

    protected $validator;

    function __construct(AreaValidator $validator)
    {
        $this->validator = $validator;
    }

    public function make(array $attributes)
    {
        if($this->validator->isValid($attributes))
        {
            $area = Area::create([
                'name' => $attributes['name'],
                'type' => $attributes['name'],
                'contact_person' => $attributes['contact_person'],
                'contact_no' => $attributes['contact_no'],
                'status' => $attributes['status']
            ]);

            return $area;
        }

         throw new ValidationException('Area validation failed', $this->validator->getErrors());
    }

    public function update($attributes, $id)
    {
        if ( $this->validator->isValid($attributes) ) {

            $area = Area::findOrFail($id);

            $area->name = $attributes['name'];
            $area->type = $attributes['type'];
            $area->contact_person = $attributes['contact_person'];
            $area->contact_no = $attributes['contact_no'];
            $area->status = $attributes['status'];
            //  $parent_id = $attributes['parent_id'];
            $area->save();

            return $area;
        }

        throw new ValidationException('Area validation failed', $this->validator->getErrors());
    }

} 