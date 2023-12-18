<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWritterRequest;
use App\Http\Requests\UpdateWritterRequest;
use App\Models\Writter;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class WritterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $writters = Writter::latest()->paginate(5);
        return view('dashboard.writters.index', compact('writters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.writters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWritterRequest $request)
    {
        // $request->validated([
        //     'name' => 'required|string|max:255',
        //     'address' => 'required|string',
        // ]);
        Writter::create($request->all());

        Session::flash('success', 'Penulis berhasil ditambahkan!');
        return redirect()->route('writters.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Writter $writter)
    {
        return view('dashboard.writters.show', compact('writter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Writter $writter)
    {
        return view('dashboard.writters.edit', compact('writter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWritterRequest $request, Writter $writter)
    {
        $request->validated([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
        ]);
        $writter->update($request->all());
        return redirect()->route('writters.index')->with('success', 'Penulis berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Writter $writter)
    {
        $writter->delete();
        return redirect()->route('writters.index')->with('success', 'Penulis berhasil dihapus.');
    }
}
