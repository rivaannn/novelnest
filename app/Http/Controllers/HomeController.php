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
        $books = Books::all();
        $blogs = Blogs::all();
        return view('home', [
            'active' => 'home',
            'categories' => $categories,
            'books' => $books,
            'blogs' => $blogs,
        ]);
    }
}
