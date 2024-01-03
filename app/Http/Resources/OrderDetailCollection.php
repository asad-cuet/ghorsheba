<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailCollection extends JsonResource
{
    public function toArray($request)
    {
            if ($this->resource === null) 
            {
                return [];
            }
            return [
            'id' => $this->id,
            'total_bill' => $this->total_bill,
            'book_type' => $this->book_type,
            'order_completed' => $this->order_completed,
            'payment_completed' => $this->payment_completed,
            'provider_completed' => $this->provider_completed,
            '' => $this->,
            'user_id' => $this->user_id,
            'service_id' => $this->service_id,
            'transiction_id' => $this->transiction_id,
            'to_provider_id' => $this->to_provider_id,
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