<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop_brand extends Model
{
    protected $table = "shop_brand";
    protected $primaryKyey = "b_id";
    public $timestamps = false;
    protected $guarded = [];
}
