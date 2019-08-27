<?php

namespace App;

use App\Product;
use App\User;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    public function product(){
        return $this->hasOne(Product::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
