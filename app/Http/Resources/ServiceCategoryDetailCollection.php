<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceCategoryDetailCollection extends JsonResource
{
    public function toArray($request)
    {
            if ($this->resource === null) 
            {
                return [];
            }
            return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'coverimage' => $this->coverimage,
            'image' => $this->image? asset($this->image):null,
            ];
    }
    public function with($request)
    {
        if ($this->resource === null) 
        {
            return [
                'success' => false,
                'status' => 404
            ];
        }
        return [
            'success' => true,
            'status' => 200
        ];
    }
}