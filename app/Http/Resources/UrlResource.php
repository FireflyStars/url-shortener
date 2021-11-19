<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UrlResource extends JsonResource
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
            'destination' => $this->destination,
            'slug' => $this->slug,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            'id' => $this->id,
            'shortened_url' => config('app.shorten_url')."/".$this->slug,
        ];
    }
}
