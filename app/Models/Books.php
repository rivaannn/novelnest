<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Publishers;
use App\Models\Writter;
use App\Models\Category;

class Books extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'username',
    //     'email',
    //     'password',
    // ];
    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    // protected $fillable = [
    //     'title',
    //     'description',
    //     'price',
    //     'book_number',
    //     'writter_id',
    //     'publisher_id',
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
        return $this->hasMany(BookOrder::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'book_orders');
    }
}
