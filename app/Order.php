<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['id','item','customer_id'];

    public  function  customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }
}
