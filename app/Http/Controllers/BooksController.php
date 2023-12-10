<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorebooksRequest;
use App\Http\Requests\UpdatebooksRequest;
use App\Models\Books;

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
    public function create()
    {
        return view('dashboard.books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorebooksRequest $request)
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
        Books::create($request->all());
        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Books $books)
    {
        return view('dashboard.books.show', compact('books'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Books $books)
    {
        return view('dashboard.books.edit', compact('books'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatebooksRequest $request, Books $books)
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
        $books->update($request->all());
        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Books $books)
    {
        $books->delete();
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }
}
