<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storebook_categoriesRequest;
use App\Http\Requests\Updatebook_categoriesRequest;
use App\Models\book_categories;

class BookCategoriesController extends Controller
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
    public function store(Storebook_categoriesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(book_categories $book_categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(book_categories $book_categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatebook_categoriesRequest $request, book_categories $book_categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(book_categories $book_categories)
    {
        //
    }
}
