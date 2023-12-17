<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Writter;
use App\Models\Category;
use App\Models\Publishers;
use Illuminate\Routing\Controller;
use App\Http\Requests\StorebooksRequest;
use App\Http\Requests\UpdatebooksRequest;
use Illuminate\Http\Request;

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
        $writter = Writter::all();
        $publishers = Publishers::all();
        return view('dashboard.books.create', [
            'writers' => $writter,
            'publishers' => $publishers,
            'categories' => Category::all()
        ]);
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
            'writter_id' => 'required|integer',
            'publisher_id' => 'required|integer'
        ]);
        self::generate_book_number();
        Books::create($request->all());

        try {
            return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('books.index')->with('error', 'Buku gagal ditambahkan.');
        }
    }

    public function generate_book_number()
    {
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
        $writters = Writter::all();
        $publishers = Publishers::all();
        return view('dashboard.books.edit', [
            'book' => $book,
            'writters' => $writters,
            'publishers' => $publishers,
            'categories' => Category::all()
        ]);
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
            'writter_id' => 'required|integer',
            'publisher_id' => 'required|integer',
        ]);

        try {
            $book->update($request->all());
            return redirect()->route('books.index')->with('success', 'Buku berhasil diupdate.');
        } catch (\Exception $e) {
            return redirect()->route('books.index')->with('error', 'Buku gagal diupdate.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Books $book)
    {
        try {
            $book->delete();
            return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('books.index')->with('error', 'Buku gagal dihapus.');
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        // Jika query tidak kosong, cari buku sesuai query
        if ($query) {
            $books = Books::where('title', 'like', "%$query%")
                ->orWhere('description', 'like', "%$query%")
                ->orWhere('book_number', 'like', "%$query%")
                ->orWhereHas('writter', function ($writterQuery) use ($query) {
                    $writterQuery->where('name', 'like', "%$query%");
                })
                ->orWhereHas('publisher', function ($publisherQuery) use ($query) {
                    $publisherQuery->where('nama', 'like', "%$query%");
                })
                ->orWhereHas('category', function ($categoryQuery) use ($query) {
                    $categoryQuery->where('name', 'like', "%$query%");
                })
                ->get();
        } else {
            // Jika query kosong, tampilkan semua buku
            $books = Books::all();
        }

        return view('dashboard.books.index', compact('books'));
    }
}
