<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactDetailCollection extends JsonResource
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
            'phone' => $this->phone,
            'message' => $this->message,
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