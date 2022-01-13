<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    
    protected $table = "m_gallery";
    protected $fillable = ['description','filename','created_at','updated_at'];
}
