<?php

namespace App\Models\User\AddToCart;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddToCart extends Model
{
    use HasFactory;
    protected $fillable =['productId','userId','quantity','price'];

    public function products(){
        return $this->belongsTo(Product::class , 'productId' ,'id');
    }
    // return $this->belongsTo(Product::class, 'prod_id', 'id');
}
