<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function invoice()
    {
        return $this->belongsTo(Category::class, 'invoice_id');
    }
    public function customer()
    {
        return $this->belongsTo(Category::class, 'customer_id');
    }

}
