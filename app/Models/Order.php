<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    protected $table = "t_order";
    protected $fillable = ['catalog_id','order_id','category_id','firstname','lastname','email','user_id','phone','address','city','zip_code','fix_price','created_at','status','remarks','updated_at'];
}
