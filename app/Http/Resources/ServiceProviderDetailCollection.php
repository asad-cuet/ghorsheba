<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceProviderDetailCollection extends JsonResource
{
    public function toArray($request)
    {
            if ($this->resource === null) 
            {
                return [];
            }
            return [
            'id' => $this->id,
            'about' => $this->about,
            'city' => $this->city,
            'service_locations' => $this->service_locations,
            'user_id' => $this->user_id,
            'service_category_id' => $this->service_category_id,
            'service_category_id' => $this->service_category_id,
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