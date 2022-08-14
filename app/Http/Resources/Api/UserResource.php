<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'email' => $this->email,
            'firstName' => $this->first_name,
            'lastName' => $this->last_name,
            'role' => $this->role,
            'phoneNumber' => $this->phone_number,
            'avatar' => $this->avatar,
            'researchgroupId' => $this->researchgroup_id,
            'departmentId' => $this->department_id,
            'academicgroupId' => $this->academicgroup_id,
            'researchGate' => $this->research_gate,
            'googleScholar' => $this->google_scholar,
            'linkedin' => $this->linkedin,
            'facebook' => $this->facebook,
            'tweeter' => $this->tweeter,
            'instagram' => $this->instagram,
        ];
    }
}
