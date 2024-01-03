<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderCollection extends ResourceCollection
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
            'total_bill' => $data->total_bill,
            'book_type' => $data->book_type,
            'order_completed' => $data->order_completed,
            'payment_completed' => $data->payment_completed,
            'provider_completed' => $data->provider_completed,
            'user_id' => $data->user_id,
            'service_id' => $data->service_id,
            'transiction_id' => $data->transiction_id,
            'to_provider_id' => $data->to_provider_id,
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