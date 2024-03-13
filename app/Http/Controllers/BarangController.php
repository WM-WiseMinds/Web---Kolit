<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Portfolio;
use App\Models\Ukuran;
use Illuminate\Http\Request;

class BarangController extends Controller
{

    protected $keranjang;
    protected $portfolio;
    protected $ukuran;

    public function __construct(Keranjang $keranjang,Portfolio $portfolio, Ukuran $ukuran)
    {
        $this->keranjang = $keranjang;
        $this->ukuran = $ukuran;
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
