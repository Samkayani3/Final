<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class Product extends Model
{
    protected $table="products";
    protected $fillable=[
        'category_id','product_name','product_code','description','price','image','video',
    ];


    public static function cartCount(){
        $user_email = Auth::user()->email;
        $cartCount = DB::table('cart')->where('user_email',$user_email)->sum('quantity');
        return $cartCount;
    }


    public static function productCount($cat_id){
        $catCount =Product::where(['category_id'=>$cat_id])->count();
        return $catCount;

    }
}
