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
            'email' => $this['email'],
            'phone' => $this['contacts']['phone'],
            'address' => $this['contacts']['address'],
        ];
    }
}