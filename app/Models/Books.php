<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Publishers;

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

    protected $fillable = [
        'title',
        'description',
        'price',
        'book_number',
        'writer_id',
        'publisher_id',
        'year',
        'image',
        'status',
    ];

    public function writer()
    {
        return $this->belongsTo(Writer::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publishers::class);
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
