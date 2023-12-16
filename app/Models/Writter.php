<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\books;

class Writter extends Model
{
    use HasFactory;
    public function books()
    {
        return $this->hasMany(Books::class);
    }

    protected $guarded = ['id'];
}
