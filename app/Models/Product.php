<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
     'category_id', 'product_name', 'brand_id','product_desc', 'product_content', 'product_price', 'product_image', 'product_type', 'product_status'
    ];
    protected $primaryKey = 'product_id';
    protected $table = 'tbl_product';

    public function product(){
        return $this->hasMany('App\Models\Comment');
    }
}
