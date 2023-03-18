<?php

namespace App\Models\login;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; 

class User extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['name', 'contact', 'email',  'password','googleId', 'facebookId','img_path','address', 'city', 'zip_code', 'user_type'];
  
}
