@extends('layouts.user')

@section('content')

<div class="max-w-7xl mx-auto space-y-8">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <div>
            <p class="text-purple-400 font-semibold text-sm mb-1">
                DASHBOARD PELANGGAN
            </p>

            <h1 class="text-3xl md:text-4xl font-bold text-white">
                Halo, {{ auth()->user()->name }} 👋
            </h1>

            <p class="text-gray-400 mt-2">
                Pantau pesanan joki kamu dengan mudah dari dashboard.
            </p>
        </div>

        <a href="{{ route('user.order') }}"
           class="inline-flex items-center justify-center gap-2 bg-purple-600 hover:bg-purple-700 px-5 py-3 rounded-xl text-white font-semibold transition shadow-lg shadow-purple-900/30">
            <span class="text-xl">+</span>
            Buat Order Baru
        </a>

    </div>

    {{-- STATUS AKUN --}}
    <div class="bg-[#16122D] border border-purple-900 rounded-2xl p-5 flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <div>
            <p class="text-gray-400 text-sm">
                Status Akun
            </p>

            <p class="text-white font-semibold mt-1">
                {{ auth()->user()->email }}
            </p>
        </div>

        <div>
            @if(auth()->user()->status == 'aktif')

                <span class="inline-flex items-center gap-2 bg-green-500/15 border border-green-500/30 text-green-400 px-4 py-2 rounded-full font-semibold text-sm">
                    <span class="w-2 h-2 bg-green-400 rounded-full"></span>
                    Akun Aktif
                </span>

            @else

                <span class="inline-flex items-center gap-2 bg-red-500/15 border border-red-500/30 text-red-400 px-4 py-2 rounded-full font-semibold text-sm">
                    <span class="w-2 h-2 bg-red-400 rounded-full"></span>
                    Akun Suspend
                </span>

            @endif
        </div>

    </div>

    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">

        {{-- Total --}}
        <div class="bg-[#16122D] border border-purple-900 rounded-2xl p-6 hover:border-purple-600 transition">

            <div class="flex items-start justify-between">
                <div>
                    <p class="text-gray-400 text-sm">
                        Total Order
                    </p>

                    <h2 class="text-4xl font-bold text-white mt-3">
                        {{ $totalOrder }}
                    </h2>

                    <p class="text-gray-500 text-xs mt-2">
                        Semua pesanan kamu
                    </p>
                </div>

                <div class="w-12 h-12 rounded-xl bg-purple-500/20 flex items-center justify-center text-2xl">
                    📦
                </div>
            </div>

        </div>

        {{-- Pending --}}
        <div class="bg-[#16122D] border border-yellow-500/20 rounded-2xl p-6 hover:border-yellow-500/60 transition">

            <div class="flex items-start justify-between">
                <div>
                    <p class="text-gray-400 text-sm">
                        Menunggu Konfirmasi
                    </p>

                    <h2 class="text-4xl font-bold text-yellow-400 mt-3">
                        {{ $pending }}
                    </h2>

                    <p class="text-gray-500 text-xs mt-2">
                        Pesanan status pending
                    </p>
                </div>

                <div class="w-12 h-12 rounded-xl bg-yellow-500/15 flex items-center justify-center text-2xl">
                    ⏳
                </div>
            </div>

        </div>

        {{-- Proses --}}
        <div class="bg-[#16122D] border border-blue-500/20 rounded-2xl p-6 hover:border-blue-500/60 transition">

            <div class="flex items-start justify-between">
                <div>
                    <p class="text-gray-400 text-sm">
                        Sedang Diproses
                    </p>

                    <h2 class="text-4xl font-bold text-blue-400 mt-3">
                        {{ $proses }}
                    </h2>

                    <p class="text-gray-500 text-xs mt-2">
                        Pesanan sedang dikerjakan
                    </p>
                </div>

                <div class="w-12 h-12 rounded-xl bg-blue-500/15 flex items-center justify-center text-2xl">
                    ⚡
                </div>
            </div>

        </div>

        {{-- Selesai --}}
        <div class="bg-[#16122D] border border-green-500/20 rounded-2xl p-6 hover:border-green-500/60 transition">

            <div class="flex items-start justify-between">
                <div>
                    <p class="text-gray-400 text-sm">
                        Order Selesai
                    </p>

                    <h2 class="text-4xl font-bold text-green-400 mt-3">
                        {{ $selesai }}
                    </h2>

                    <p class="text-gray-500 text-xs mt-2">
                        Pesanan berhasil selesai
                    </p>
                </div>

                <div class="w-12 h-12 rounded-xl bg-green-500/15 flex items-center justify-center text-2xl">
                    ✓
                </div>
            </div>

        </div>

    </div>

    {{-- ORDER TERBARU --}}
    <div class="bg-[#16122D] border border-purple-900 rounded-2xl overflow-hidden">

        <div class="p-6 border-b border-purple-900 flex items-center justify-between">

            <div>
                <h2 class="text-xl font-bold text-white">
                    Order Terbaru
                </h2>

                <p class="text-gray-400 text-sm mt-1">
                    5 pesanan terakhir kamu.
                </p>
            </div>

            <a href="{{ route('user.status-order') }}"
               class="text-purple-400 hover:text-purple-300 text-sm font-semibold">
                Lihat Semua →
            </a>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full text-left text-gray-300">

                <thead class="bg-[#211B42] text-gray-400 text-sm">

                    <tr>
                        <th class="px-6 py-4">ID</th>
                        <th class="px-6 py-4">Game</th>
                        <th class="px-6 py-4">Nomor HP</th>
                        <th class="px-6 py-4">Tanggal</th>
                        <th class="px-6 py-4">Status</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($ordersTerbaru as $order)

                        <tr class="border-t border-purple-900 hover:bg-[#211B42] transition">

                            <td class="px-6 py-4 font-semibold text-white">
                                #{{ $order->id }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $order->game->nama_game ?? '-' }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $order->nomor_hp }}
                            </td>

                            <td class="px-6 py-4 text-sm">
                                {{ $order->created_at->format('d M Y') }}
                            </td>

                            <td class="px-6 py-4">

                                @if($order->status == 'pending')

                                    <span class="bg-yellow-500/20 text-yellow-400 px-3 py-1 rounded-full text-xs font-semibold">
                                        Pending
                                    </span>

                                @elseif($order->status == 'proses')

                                    <span class="bg-blue-500/20 text-blue-400 px-3 py-1 rounded-full text-xs font-semibold">
                                        Diproses
                                    </span>

                                @elseif($order->status == 'selesai')

                                    <span class="bg-green-500/20 text-green-400 px-3 py-1 rounded-full text-xs font-semibold">
                                        Selesai
                                    </span>

                                @else

                                    <span class="bg-red-500/20 text-red-400 px-3 py-1 rounded-full text-xs font-semibold">
                                        Dibatalkan
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">

                                <div class="text-4xl mb-3">
                                    📭
                                </div>

                                <p class="text-gray-400">
                                    Belum ada pesanan.
                                </p>

                                <a href="{{ route('user.order') }}"
                                   class="inline-block mt-4 text-purple-400 hover:text-purple-300 font-semibold text-sm">
                                    Buat order pertama kamu →
                                </a>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection