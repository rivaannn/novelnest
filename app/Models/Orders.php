<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    public function books()
    {
        return $this->belongsToMany(Books::class, 'book_orders', 'order_id', 'book_id');
    }
}
