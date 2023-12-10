<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('home', [
            'active' => 'home',
            'categories' => $categories
        ]);
    }
}
