<?php

namespace App\Http\Controllers;

use App\Models\Detailpelanggan;
use App\Models\Faq;
use App\Models\Keranjang;
use App\Models\Roles;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $roles;
    protected $transaksi;
    protected $faq;
    protected $keranjang;
    protected $detailpelanggan;

    public function __construct(Roles $roles, Transaksi $transaksi, Faq $faq, Keranjang $keranjang, Detailpelanggan $detailpelanggan)
    {
        $this->roles = $roles;
        $this->transaksi = $transaksi;
        $this->faq = $faq;
        $this->keranjang = $keranjang;
        $this->detailpelanggan = $detailpelanggan;
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
