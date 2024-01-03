<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ServiceProviderCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection->map(function ($data) {
            if ($this->collection->isEmpty()) 
            {
                return [];
            }
            return [
            'id' => $data->id,
            'about' => $data->about,
            'city' => $data->city,
            'service_locations' => $data->service_locations,
            'user_id' => $data->user_id,
            'service_category_id' => $data->service_category_id,
            'service_category_id' => $data->service_category_id,
            'image' => $data->image? asset($data->image):null,
            ];
        });
    }
    public function with($request)
    {
        if ($this->collection->isEmpty()) 
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