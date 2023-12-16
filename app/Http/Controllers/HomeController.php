<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Books;
use App\Models\Category;
use Database\Seeders\BookSeeder;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        // Mengambil buku yang paling baru
        $latestBooks = Books::latest()->limit(4)->get();

        $blogs = Blogs::all();
        return view('home', [
            'active' => 'home',
            'categories' => $categories,
            'latestBooks' => $latestBooks,
            'blogs' => $blogs,
        ]);
    }
}
