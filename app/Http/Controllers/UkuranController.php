<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Ukuran;
use Illuminate\Http\Request;

class UkuranController extends Controller
{
    protected $ukuran;
    protected $barang;

    public function __construct(Ukuran $ukuran, Barang $barang)
    {
        $this->ukuran = $ukuran;
        $this->barang = $barang;
    }

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
