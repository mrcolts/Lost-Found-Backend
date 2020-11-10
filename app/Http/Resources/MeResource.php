<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'fullName' => $this['full_name'],
            'phone' => $this['phone'],
            'email' => $this['email'],
            'avatar' => $this['img_index'],
            'address' => ContactsResource::collection($this['contacts']),
        ];
    }
}
