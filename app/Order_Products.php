<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Products extends Model
{
    protected $table='orders_products';

    protected $fillable = [
        'order_id','user_id','product_name','product_code', 'product_price','product_qty',
        
    ];
}
