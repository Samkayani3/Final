<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='order';

    protected $fillable = [
        'user_id','customer_name','customer_email', 'customer_phone','customer_address1',
        'customer_address2','total_amount', 'payment_method','order_status',
    ];

    public function orders(){
        return $this->hasMany('App\Order_Products','order_id');
    }
}
