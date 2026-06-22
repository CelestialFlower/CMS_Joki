<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
{
    $games = Game::where('status', 'aktif')->get();

    return view(
        'user.order',
        compact('games')
    );
}
public function store(Request $request)
{
    if(auth()->user()->status == 'suspend')
    {
            return back()->with('suspended', true);
    }

    Order::create([

        'user_id' => auth()->id(),

        'game_id' => $request->game_id,

        'nomor_hp' => $request->nomor_hp,

        'status' => 'pending'

    ]);

    return back()->with(
        'success',
        'Pesanan berhasil dibuat'
    );
}
public function update(
    Request $request,
    Order $order
)
{
    $order->update([
        'status' => $request->status
    ]);

    return back();
}
public function kelolaorder(Request $request)
{
    $query = Order::with(['user','game']);

    if ($request->status && $request->status != 'semua') {
        $query->where('status', $request->status);
    }

    $orders = $query->latest()->get();

    $pending = Order::where('status', 'pending')->count();
    $proses = Order::where('status', 'proses')->count();
    $selesai = Order::where('status', 'selesai')->count();
    $dibatalkan = Order::where('status', 'dibatalkan')->count();

    return view(
        'admin.kelolaorder',
        compact(
            'orders',
            'pending',
            'proses',
            'selesai',
            'dibatalkan'
        )
    );
}
}
