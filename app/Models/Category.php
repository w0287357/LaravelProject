<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Category extends Model
{
    // Define which attributes are mass assignable
    protected $fillable = ['name'];
}
