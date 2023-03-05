<?php

namespace App\Models\User\UserAddress;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable =['userId','Address','city','zip_code'];
}
