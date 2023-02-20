<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable = ['name','parent_id','isParent', 'status', 'description'];
    protected $primaryKey ='categoryId';

    public function parent(){
        return $this->belongsTo(Category::class,'parent_id');
    }
    public function product(){
        return $this->hasMany(Product::class);
    }
}
