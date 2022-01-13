<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }

}
