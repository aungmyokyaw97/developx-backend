<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Vinkla\Hashids\Facades\Hashids;

class ProjectListResource extends JsonResource
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
            'id' => Hashids::encode($this->id),
            'title' => $this->title,
            'sub_title' => $this->sub_title,
            'description' => $this->description,
            'thumbnail' => 'https://developx.sharedwithexpose.com/images/thumbnail/'.$this->thumbnail,
            'app_image' => json_decode($this->app_image),
            'web_image' => json_decode($this->web_image),
            'app_image_url' => 'https://developx.sharedwithexpose.com/images/app/',
            'web_image_url' => 'https://developx.sharedwithexpose.com/images/web/'
        ];
    }
}
