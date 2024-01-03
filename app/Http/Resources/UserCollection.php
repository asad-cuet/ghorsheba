<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
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
            'email' => $data->email,
            'profile_photo_path' => $data->profile_photo_path,
            'utype' => $data->utype,
            'phone' => $data->phone,
            'current_team_id' => $data->current_team_id,
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