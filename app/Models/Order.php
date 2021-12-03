<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    public function products() {
        return $this->belongsToMany(Products::class)->withTimestamps()->withPivot('qty');
    }

    public function getSumAttribute() {
        $products = $this->products;
        $sum = 0;
        foreach ($products as $product) {
            $sum += ($product->price * $product->pivot->qty);
        }
        return $sum;
    }


}
