<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'id' => $this->id,
            'attributes' => [
                'content' => $this->content,
                'created_at'=> $this->created_at,
                'updated_at'=> $this->updated_at,
            ],
            'relationships' => [
                'user' => new UserResource($this->user)
            ],
            'links' => [
                'self' => ''
            ]
        ];
    }
}
