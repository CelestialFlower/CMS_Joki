<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\Storage;


class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();

        return view(
            'admin.kelolagame',
            compact('games')
        );
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
{
    $request->validate([
        'nama_game' => 'required',
        'kategori' => 'required',
        'deskripsi' => 'nullable',
        'status' => 'required',
        'thumbnail' => 'required|image'
    ]);

    $thumbnailPath = null;

    if ($request->hasFile('thumbnail')) {

        $thumbnailPath = $request
            ->file('thumbnail')
            ->store('games', 'public');
    }

    Game::create([
        'nama_game' => $request->nama_game,
        'kategori' => $request->kategori,
        'deskripsi' => $request->deskripsi,
        'status' => $request->status,
        'thumbnail' => $thumbnailPath,
    ]);

    return redirect()->back()
        ->with('success', 'Game berhasil ditambahkan');
}

    
    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        //
    }

   
   public function update(Request $request, Game $game)
{
    $request->validate([
        'nama_game' => 'required|string|max:255',
        'kategori' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'status' => 'required|in:aktif,nonaktif',
        'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $data = [
        'nama_game' => $request->nama_game,
        'kategori' => $request->kategori,
        'deskripsi' => $request->deskripsi,
        'status' => $request->status,
    ];

    if ($request->hasFile('thumbnail')) {

        // Hapus thumbnail lama (opsional)
        if ($game->thumbnail && Storage::disk('public')->exists($game->thumbnail)) {
            Storage::disk('public')->delete($game->thumbnail);
        }

        $path = $request
            ->file('thumbnail')
            ->store('games', 'public');

        $data['thumbnail'] = $path;
    }

    $game->update($data);

    return redirect()->back()
        ->with('success', 'Game berhasil diperbarui');
}

  
    public function destroy(Game $game)
{
    $game->delete();

    return back()->with(
        'success',
        'Game berhasil dihapus'
    );
}
}
