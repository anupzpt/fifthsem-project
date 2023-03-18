<?php

namespace App\Models\Artistregister;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Artistregister extends Model
{
    protected $table = 'artistregisters';
    protected $fillable = ['name','email','contact','address','image'];
   
}
