<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{
    use HasFactory;
    protected $guarded=[];
   
    public function products(){
        return $this->belongsTo(Product::class , 'productId' ,'id');
    }
}
