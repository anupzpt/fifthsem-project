<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'categoryName','price','image', 'status', 'description','category_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
