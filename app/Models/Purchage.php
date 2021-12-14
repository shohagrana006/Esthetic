<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchage extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function supplier(){
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
    public function warehouse(){
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function branch(){
        return $this->belongsTo(Branch::class, 'branch_id');
    }
}
