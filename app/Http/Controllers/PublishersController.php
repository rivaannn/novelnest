<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorepublishersRequest;
use App\Http\Requests\UpdatepublishersRequest;
use App\Models\Publishers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class PublishersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers = Publishers::latest()->paginate(5);
        return view('dashboard.publishers.index', compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.publishers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorepublishersRequest $request)
    {
        publishers::create($request->all());

        Session::flash('success', 'Publisher berhasil ditambahkan!');
        return redirect()->route('publishers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(publishers $publishers)
    {
        return view('dashboard.publishers.show', [
            'publishers' => $publishers
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(publishers $publisher)
    {
        return view('dashboard.publishers.edit', [
            'publisher' => $publisher
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePublishersRequest $request, Publishers $publisher)
    {
        $publisher->update($request->all());
        if ($publisher) {
            // redirect ke halaman data dan mengirim pesan success
            return redirect()->route('publishers.index')->with(['success' => 'Data Berhasil Diubah!']);
        } else {
            // redirect ke halaman data dan mengirim pesan error
            return redirect()->route('publishers.index')->with(['error' => 'Data Gagal Diubah!']);
        }

        return redirect()->route('publishers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $publisher = publishers::findOrFail($id);
            $publisher->delete();
            Session::flash('success', 'Publisher berhasil dihapus.');
        } catch (\Exception $e) {
            Session::flash('error', 'Gagal menghapus publisher. Silakan coba lagi.');
        }
        return redirect()->route('publishers.index');
    }
}
