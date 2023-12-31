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
        return view('dashboarduser.order.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    public function buatOrderDariKeranjang(Request $request) {
        $books = Books::find($request->session()->get('books'));
        // return view('dashboarduser.order.index', compact('books'));
        return view('dashboarduser.order.index', [
            'books' => $books
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