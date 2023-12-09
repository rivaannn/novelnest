<?php

namespace App\Models;

// use App\Models\Category;
use App\Models\Writter;
use App\Models\Publishers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    public function writter() {
        return $this->belongsTo(Writter::class, 'writter_id');
    }
    public function publisher() {
        return $this->belongsTo(Publishers::class, 'publisher_id');
    }
    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
}