<?php

namespace App\Models\User\Order;

use App\Models\login\User;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function products(){
        return $this->belongsTo(Product::class , 'productId' ,'id');
    }

    public function login() {
        return $this->belongsTo(User::class , 'userId' ,'id');

    }
}
