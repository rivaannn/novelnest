<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Books;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $keranjangBuku = Books::find($request->session()->get('books'));

        // Mengambil buku yang paling baru
        $latestBooks = Books::latest()->limit(4)->get();

        $blogs = Blogs::all();
        return view('home', [
            'active' => 'home',
            'categories' => $categories,
            'latestBooks' => $latestBooks,
            'blogs' => $blogs,
            'keranjangBuku' => $keranjangBuku
        ]);
    }
}
