<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ServiceCategoryCollection extends ResourceCollection
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
            'name' => $data->name,
            'slug' => $data->slug,
            'price' => $data->price,
            'discount' => $data->discount,
            'total' => $data->total,
            'description' => $data->description,
            'coverimage' => $data->coverimage,
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