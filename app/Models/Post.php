<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
     'post_name', 'post_des', 'created_at'
    ];
    protected $primaryKey = 'post_id ';
    protected $table = 'tbl_post';

}
