<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
     'customer_name', 'customer_email', 'customer_password', 'customer_phone', 'customer_address', 'customer_img', 'customer_vip', 'customer_token'
    ];
    protected $primaryKey = 'customer_id';
    protected $table = 'tbl_customer';
}
