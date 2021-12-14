<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function sub_category(){
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }
    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function branch(){
        return $this->belongsTo(Branch::class, 'branch_id');
    }


}
