<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;    
use App\Models\Artikel;
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
    $games = Game::where('status', 'aktif')->get();

    $articles = Artikel::with('game')
        ->where('status', 'publish')
        ->latest()
        ->take(8)
        ->get();

    return view('fronted.home', compact(
        'games',
        'articles'
    ));
}

    public function game()
    {
        $games = Game::all();

        return view('fronted.game', compact('games'));
    }

public function artikel()
{
    $artikels = Artikel::with('game')
        ->where('status', 'publish')
        ->latest()
        ->get();

    return view(
        'fronted.artikel',
        compact('artikels')
    );
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
    public function riwayat()
    {
        return view('user.riwayat');
    }
    public function kelolaartikel()
    {
        return view('admin.kelolaartikel');
    }
    public function kelolagame()
    {
        return view('admin.kelolagame');
    }
    public function order()
    {
        return view('user.order');
    }
    public function kelolaorder()
    {
        return view('admin.kelolaorder');
    }
   public function showGame($id)
{
    $game = Game::findOrFail($id);

    $artikels = Artikel::where('game_id', $id)
        ->where('status', 'publish')
        ->latest()
        ->get();

    return view(
        'fronted.game-detail',
        compact('game', 'artikels')
    );
}
public function showArtikel($id)
{
    $artikel = Artikel::with('game')->findOrFail($id);

    return view('fronted.artikel-detail', compact('artikel'));
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
