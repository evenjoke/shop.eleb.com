<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable=['goods_price','description','month_sales','status','rating','shop_id',
        'rating_count','tips','satisfy_count','satisfy_rate','goods_img','goods_name',
        'category_id',
       ];
}
