<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostsResource extends JsonResource
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
            'title' => $this['title'],
            'description' => $this['description'],
            'location' => $this['location'],
            'imageIndex' => $this['img_index'],
            'category' => CategoriesResource::make($this['category']),
            'user' => UserResource::make($this['user']),
            'createdAt' => $this['created_at']
        ];
    }
}
