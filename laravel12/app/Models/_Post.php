<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;




class _Post extends Model 
{
    protected $fillable = ['title','author','slug','body'];

}