<?php

namespace App\Models\User\Home;
use App\Models\Product\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $guarded=[];
    
    public function products(){
        return $this->belongsTo(Product::class , 'productId' ,'id');
    }
}
