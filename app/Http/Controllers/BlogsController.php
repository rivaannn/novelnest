<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogs;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs = Blogs::latest()->paginate(5);
        return view('dashboard.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('dashboard.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|min:3',
            'slug' => 'required|max:255|min:3',
            'category' => 'required|max:255|min:3',
            'author' => 'required|max:255|min:3',
            'body' => 'required|max:255|min:3',
            'image' => 'required|max:255|min:3',
            'status' => 'required|max:255|min:3'
        ]);

        Blogs::create($request->all());

        return redirect('/dashboard/blogs')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function show(Blogs $blog)
    {
        return view('dashboard.blogs.show', compact('blog'));
    }

    public function edit(Blogs $blog)
    {
        return view('dashboard.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blogs $blog)
    {
        $request->validate([
            'title' => 'required|max:255|min:3',
            'slug' => 'required|max:255|min:3',
            'category' => 'required|max:255|min:3',
            'author' => 'required|max:255|min:3',
            'body' => 'required|max:255|min:3',
            'image' => 'required|max:255|min:3',
            'status' => 'required|max:255|min:3'
        ]);

        Blogs::where('id', $blog->id)
            ->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'category' => $request->category,
                'author' => $request->author,
                'body' => $request->body,
                'image' => $request->image,
                'status' => $request->status
            ]);
        return redirect('/dashboard/blogs')->with('success', 'Data Berhasil Diubah!');
    }

    public function destroy(Blogs $blog)
    {
        Blogs::destroy($blog->id);
        return redirect()->route('blogs.index')->with('success', 'Blog berhasil dihapus.');
    }
}
