<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class AcademicgroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [//We can change a name of the field is we want
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'picture' => $this->picture,
            'departmentId' => $this->department_id,
        ];
    }
}
