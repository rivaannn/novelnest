<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storebook_ordersRequest;
use App\Http\Requests\Updatebook_ordersRequest;
use App\Models\book_orders;

class BookOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storebook_ordersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(book_orders $book_orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(book_orders $book_orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatebook_ordersRequest $request, book_orders $book_orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(book_orders $book_orders)
    {
        //
    }
}
