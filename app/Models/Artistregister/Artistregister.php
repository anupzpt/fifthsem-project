<?php

namespace App\Models\Artistregister;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artistregister extends Model
{
    protected $table = 'artistregisters';
    protected $fillable = ['name','email','contact','address','image'];
}
