<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;    
use App\Models\Artikel;
use App\Models\User;
use App\Models\Order;
class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.front');
    }
    
public function dashboard()
{
    $totalOrder = Order::count();
    $orderPending = Order::where('status','pending')->count();
    $orderDiproses = Order::where('status','proses')->count();
    $orderSelesai = Order::where('status','selesai')->count();

    $totalPelanggan = User::where('role','user')->count();

    $totalGame = Game::count();
    $totalArtikel = Artikel::count();

    $orderTerbaru = Order::with(['user','game'])
                        ->latest()
                        ->take(5)
                        ->get();

    return view('admin.dashboard', compact(
        'totalOrder',
        'orderPending',
        'orderDiproses',
        'orderSelesai',
        'totalPelanggan',
        'totalGame',
        'totalArtikel',
        'orderTerbaru'
    ));
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
    $pelanggan = User::where('role', 'user')
        ->withCount('orders')
        ->get();

    $totalPelanggan = User::where('role', 'user')->count();

    $aktif = User::where('role', 'user')
        ->where('status', 'aktif')
        ->count();

    $suspend = User::where('role', 'user')
        ->where('status', 'suspend')
        ->count();

    $orderHariIni = Order::whereDate(
        'created_at',
        today()
    )->count();

    return view(
        'admin.costumer',
        compact(
            'pelanggan',
            'totalPelanggan',
            'aktif',
            'suspend',
            'orderHariIni'
        )
    );
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
    public function showOrders()
{
    $orders = Order::with([
        'user',
        'game'
    ])->latest()->get();

    return view(
        'admin.orders',
        compact('orders')
    );
}
public function updatestatus(
    Request $request,
    Order $order
)
{
    $order->update([
        'status' => $request->status
    ]);

    return back();
}
public function showArtikel($id)
{
    $artikel = Artikel::with('game')->findOrFail($id);

    return view('fronted.artikel-detail', compact('artikel'));
}
   


public function kelolaorder(Request $request)
{
    $status = $request->status;

    $query = Order::with(['user','game']);

    if ($status && $status != 'semua') {
        $query->where('status', $status);
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

public function pelanggan()
{
    $pelanggan = User::where('role', 'user')
        ->withCount('orders')
        ->withCount([
            'orders as pending_count' => function($q){
                $q->where('status', 'pending');
            },

            'orders as proses_count' => function($q){
                $q->where('status', 'proses');
            },

            'orders as selesai_count' => function($q){
                $q->where('status', 'selesai');
            }
        ])
        ->get();

    $totalPelanggan = $pelanggan->count();

    $aktif = User::where('role','user')
        ->where('status','aktif')
        ->count();

    $suspend = User::where('role','user')
        ->where('status','suspend')
        ->count();

    return view(
        'admin.kelola-pelanggan',
        compact(
            'pelanggan',
            'totalPelanggan',
            'aktif',
            'suspend'
        )
    );
}
public function ubahStatus(Request $request, User $user)
{
    $user->update([
        'status' => $request->status
    ]);

    return back()
        ->with('success', 'Status pelanggan berhasil diperbarui');
}
    public function updateOrder(Request $request, Order $order)
{
    $request->validate([
        'status' => 'required'
    ]);

    $order->update([
        'status' => $request->status
    ]);

    return back()
        ->with('success', 'Status order berhasil diperbarui');
}
}
