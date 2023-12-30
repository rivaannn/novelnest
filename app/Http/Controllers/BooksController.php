<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Orders;
use App\Models\Writter;
use App\Models\Category;
use App\Models\BookOrder;
use App\Models\Publishers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorebooksRequest;
use App\Http\Requests\UpdatebooksRequest;
use Illuminate\Contracts\Session\Session;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Books::latest()->paginate(5);
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
            'publisher_id' => 'required|integer',
            'category_id' => 'required|integer',
        ]);

        // Menggunakan transaksi database untuk memastikan konsistensi
        DB::beginTransaction();

        try {
            // Menyimpan buku
            $book = Books::create($request->all());

            // Mengenerate nomor buku
            $book->update([
                'book_number' => $this->generate_book_number($book->id)
            ]);

            // Commit transaksi jika semua langkah berhasil
            DB::commit();

            return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Rollback transaksi jika ada kesalahan
            DB::rollBack();

            return redirect()->route('books.index')->with('error', 'Buku gagal ditambahkan.');
        }
    }

    // Fungsi untuk menggenerate nomor buku
    public function generate_book_number($bookId)
    {
        $year = now()->year;
        $bookId = str_pad($bookId, 4, '0', STR_PAD_LEFT);
        $publisherCode = 'BK';

        return "{$year}SJ{$bookId}{$publisherCode}";
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
        $categories = Category::all();
        return view('dashboard.books.edit', [
            'book' => $book,
            'writters' => $writters,
            'publishers' => $publishers,
            'categories' => $categories,
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
            'category_id' => 'required|integer',
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
            $books = Books::paginate(5);
        }

        return view('dashboard.books.index', compact('books'));
    }

    // Fungsi Khusus Keranjang

    public function keranjangIndex()
    {
        return view('dashboard.keranjang.index');
    }

    public function removeFromKeranjang(Request $request, Books $book_id) {
        // $request->session()->forget('books');
        if($request->session()->get("books")) {
            $books = $request->session()->get("books");
            $book = $request->query('book_id');
            $books = array_diff($books, [$book]);
            $request->session()->forget('books');
            $request->session()->put('books', $books);
            return redirect()->route('kategori.index')->with('success', 'Buku berhasil dihapus dari keranjang.');
        }

    }
    public function addKeranjang(Request $request) {
        $books =$request->session()->get("books");
        if($books == NULL) {
            $books = [];
        }
        $books[] = (int)$request->book_id;
        $request->session()->put('books', $books);

        return redirect()->route('kategori.index')->with('success', 'Buku berhasil ditambahkan ke keranjang.');

   }
}