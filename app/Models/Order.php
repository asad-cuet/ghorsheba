<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    protected $fillable=['user_id','service_id','total_bill','book_type','transiction_id','completed','to_provider_id','provider_completed'];



    public function user()  //making relationship
    {
         return $this->belongsTo(User::class,'user_id','id');
    }

    public function service()  //making relationship
    {
         return $this->belongsTo(ServiceCategory::class,'service_id','id');
    }
    public function s_provider()  //making relationship
    {
         return $this->belongsTo(User::class,'to_provider_id','id');
    }
}


