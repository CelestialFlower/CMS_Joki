<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.front');
    }
    
    public function home()
    {
        return view('fronted.home');
    }

    public function game()
    {
        return view('fronted.game');
    }

    public function artikel()
    {
        return view('fronted.artikel');
    }
    
    public function tentang()
    {
        return view('fronted.tentang');
    }
    
    public function kontak()
    {
        return view('fronted.kontak');
    }
    
    public function status()
    {
        return view('user.status');
    }
    
    public function rolestatus()
    {
    dd(auth()->user()->role);

    return view('user.status');
    }
    public function penjoki()
    {
        return view('admin.penjoki');
    }
    public function costumer()
    {
        return view('admin.costumer');
    }
    public function store(Request $request)
    {
        //
    }
    public function order()
    {
        return view('user.order');
    }
    public function riwayat()
    {
        return view('user.riwayat');
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
