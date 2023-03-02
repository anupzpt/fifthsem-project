<?php

namespace App\Models\User\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable =['productId','userId','quantity','price','address'];

    public function products(){
        return $this->belongsTo(Product::class , 'productId' ,'id');
    }
}
