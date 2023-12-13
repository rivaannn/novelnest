<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Writter;
use App\Models\Category;
use App\Models\Publishers;
use Illuminate\Routing\Controller;
use App\Http\Requests\StorebooksRequest;
use App\Http\Requests\UpdatebooksRequest;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Books::all();
        return view('dashboard.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $writter = Writter::all();
        $publishers = Publishers::all();
        return view('dashboard.books.create', [
            'writers'=> $writter,
            'publishers'=> $publishers,
            'categories' => Category::all()
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StorebooksRequest $request) {
        $request->validated([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer',
            'writter_id' => 'required|integer',
            'publisher_id' => 'required|integer'
        ]);
        self::generate_book_number();
        Books::create($request->all());
        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function generate_book_number() {
        // code ..
    }
    /**
     * Display the specified resource.
     */
    public function show(Books $book)
    {
        return view('dashboard.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Books $book)
    {
        return view('dashboard.books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatebooksRequest $request, Books $book)
    {
        $request->validated([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer',
            'book_number' => 'required|integer',
            'writer_id' => 'required|integer',
            'publisher_id' => 'required|integer',
            'year' => 'required|integer',
            'image' => 'required|image',
            'status' => 'required|in:1,0',
        ]);
        $book->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);
        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Books $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }
}
