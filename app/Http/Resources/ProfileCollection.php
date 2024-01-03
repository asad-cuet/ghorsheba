<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProfileCollection extends ResourceCollection
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
            'address' => $data->address,
            'user_id' => $data->user_id,
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