<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Publishers;
use App\Models\Writter;
use App\Models\Category;
use App\Models\BookOrder;
use App\Models\User;

class Books extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // protected $fillable = [
    //     'title',
    //     'description',
    //     'price',
    //     'book_number',
    //     'writter_id',
    //     'publisher_id',
    //     'category_id',
    //     'year',
    //     'image',
    //     'status',
    // ];

    public function writter()
    {
        return $this->belongsTo(Writter::class, 'writter_id');
    }

    public function publisher()
    {
        return $this->belongsTo(Publishers::class, 'publisher_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function bookOrder()
    {
        return $this->hasMany(BookOrder::class, 'book_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'book_orders, user_id, book_id');
    }
}
