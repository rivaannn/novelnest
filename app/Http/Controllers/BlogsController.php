<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Http\Requests\BlogRequest;

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
        try {
            $request->validate([
                'title'    => 'required|max:255|min:3',
                'slug'     => 'required|max:255|min:3',
                'category' => 'required|max:255|min:3',
                'author'   => 'required|max:255|min:3',
                'body'     => 'required|min:3',  // Hapus max:255 yang tidak perlu
                'status'   => 'required|max:255|min:3'
            ]);

            Blogs::create($request->all());

            return redirect()->route('blogs.index')->with('success', 'Blog berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('blogs.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function show(Blogs $blog)
    {
        return view('dashboard.blogs.show', compact('blog'));
    }

    public function edit(Blogs $blog)
    {
        return view('dashboard.blogs.edit', compact('blog'));
    }

    public function update(BlogRequest $request, Blogs $blog)
    {
        $blog = Blogs::find($blog->id);

        try {
            $updated = Blogs::where('id', $blog->id)
                ->update([
                    'title' => $request->title,
                    'slug' => $request->slug,
                    'category' => $request->category,
                    'author' => $request->author,
                    'body' => $request->body,
                    'status' => $request->status
                ]);

            if ($updated) {
                return redirect()->route('blogs.index')->with('success', 'Blog berhasil diupdate.');
            } else {
                return redirect()->route('blogs.index')->with('error', 'Blog tidak ditemukan atau update gagal.');
            }
        } catch (\Exception $e) {
            // Tampilkan pesan kesalahan atau log jika diperlukan
            dd($e->getMessage());
        }
    }

    public function destroy(Blogs $blog)
    {
        Blogs::destroy($blog->id);
        return redirect()->route('blogs.index')->with('success', 'Blog berhasil dihapus.');
    }
}
