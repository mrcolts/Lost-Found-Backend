<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MeItemsResource extends JsonResource
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
            'id' => $this['id'],
            'name' => $this['name'],
            'imageIndex' => $this['img_index'],
            'description' => $this['description'],
            'categories' => CategoriesResource::make($this['category']),
            'status' => StatusResource::make($this['status'])
        ];
    }
}
