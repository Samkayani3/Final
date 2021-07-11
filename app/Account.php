<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'account';
    
    protected $fillable = [
        'name', 'email', 'role','address1','address2','phone_no',
    ];
}
