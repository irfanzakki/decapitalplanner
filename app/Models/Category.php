<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $table = "d_catalog";
    protected $fillable = ['catalog_id','category_name','category_code','category_type','price','description','filename','discount'];
}
