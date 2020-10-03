<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =[
        'title',
        'product_code',
        'description'
    ];

    protected $table ='products';

}
