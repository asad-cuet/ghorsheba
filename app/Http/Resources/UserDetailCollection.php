<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserDetailCollection extends JsonResource
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
            'email' => $this->email,
            'profile_photo_path' => $this->profile_photo_path,
            'utype' => $this->utype,
            'phone' => $this->phone,
            'current_team_id' => $this->current_team_id,
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