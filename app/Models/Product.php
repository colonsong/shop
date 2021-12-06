<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function carts() {
        return $this->belongsToMany(Cart::class)->withTimestamps();
    }

    public function categories() {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
}
