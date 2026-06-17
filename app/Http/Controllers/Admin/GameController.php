<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;

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
    $thumbnail = null;

    if($request->hasFile('thumbnail'))
    {
        $thumbnail = $request
            ->file('thumbnail')
            ->store('games','public');
    }

    Game::create([
        'nama_game' => $request->nama_game,
        'kategori' => $request->kategori,
        'status' => $request->status,
        'thumbnail' => $thumbnail
    ]);

    return back();
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
    public function update(Request $request, Game $game)
{
    $data = [
        'nama_game' => $request->nama_game,
        'kategori' => $request->kategori,
        'status' => $request->status,
    ];

    if ($request->hasFile('thumbnail'))
    {
        $path = $request
            ->file('thumbnail')
            ->store('games', 'public');

        $data['thumbnail'] = $path;
    }

    $game->update($data);

    return redirect()->back()
        ->with('success', 'Game berhasil diperbarui');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
{
    $game->delete();

    return back()->with(
        'success',
        'Game berhasil dihapus'
    );
}
}
