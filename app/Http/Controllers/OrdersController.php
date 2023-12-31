<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreordersRequest;
use App\Http\Requests\UpdateordersRequest;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $books = Books::all();
        $keranjangBuku = session()->get('books');
        $users = auth()->user();
        return view('dashboarduser.order.index', [
            'books' => $books,
            'keranjangBuku' => $keranjangBuku,
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    public function buatOrderDariKeranjang(Request $request)
    {
        $bookIds = session()->get('books');

        // Check if $bookIds is not null before querying the database
        if ($bookIds) {
            $books = Books::whereIn('id', $bookIds)->get();
        } else {
            $books = [];
        }

        $keranjangBuku = session()->get('books');

        return view('dashboarduser.order.index', [
            'books' => $books,
            'keranjangBuku' => $keranjangBuku
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreordersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(orders $orders)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateordersRequest $request, orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(orders $orders)
    {
        //
    }
}
