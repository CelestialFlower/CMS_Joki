<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Game;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    
    public function index()
    {
        $games = Game::all();

        $artikels = Artikel::all();

        return view(
            'admin.KelolaArtikel',
            compact(
                'games',
                'artikels'
            )
        );
    }

    public function store(Request $request)
{
    $request->validate([
        'game_id' => 'required',
        'judul' => 'required',
        'isi' => 'required',
        'status' => 'required',
        'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $thumbnailPath = null;

    if ($request->hasFile('thumbnail')) {

        $thumbnailPath = $request
            ->file('thumbnail')
            ->store('artikel', 'public');
    }

    Artikel::create([
        'game_id' => $request->game_id,
        'judul' => Str::title($request->judul),
        'isi' => $request->isi,
        'status' => $request->status,
        'thumbnail' => $thumbnailPath,
    ]);

    return redirect()->back()
        ->with('success', 'Artikel berhasil ditambahkan');
}
   public function update(Request $request, $id)
{
    $request->validate([
        'judul' => 'required',
        'isi' => 'required',
        'status' => 'required'
    ]);

    $artikel = Artikel::findOrFail($id);

    $thumbnail = $artikel->thumbnail;

    if ($request->hasFile('thumbnail')) {

        $thumbnail = $request
            ->file('thumbnail')
            ->store('artikel', 'public');
    }

    $artikel->update([

        'judul' => $request->judul,

        'isi' => $request->isi,

        'thumbnail' => $thumbnail,

        'status' => $request->status

    ]);

    return back()->with(
        'success',
        'Artikel berhasil diupdate'
    );
}
    public function destroy($id)
{
    $artikel = Artikel::findOrFail($id);

    $artikel->delete();

    return back()->with(
        'success',
        'Artikel berhasil dihapus'
    );
}
public function create()
{
    $games = Game::all();

    return view('admin.editArtikel.editArtikel', compact('games'));
}
}