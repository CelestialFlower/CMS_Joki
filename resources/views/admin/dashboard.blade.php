@extends('layouts.admin')

@section('content')

<div class="max-w-7xl mx-auto space-y-8">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">

        <div>
            <p class="text-purple-400 font-semibold text-sm tracking-wider">
                ADMIN PANEL
            </p>

            <h1 class="text-3xl md:text-4xl font-bold text-white mt-1">
                Dashboard Admin 👋
            </h1>

            <p class="text-gray-400 mt-2">
                Selamat datang, {{ auth()->user()->name }}. Pantau aktivitas JOKI CSStore dari satu halaman.
            </p>
        </div>

        <div class="flex flex-wrap gap-3">

            <a href="{{ route('admin.kelolaorder') }}"
               class="bg-purple-600 hover:bg-purple-700 px-5 py-3 rounded-xl text-white font-semibold transition shadow-lg shadow-purple-900/30">
                📦 Kelola Order
            </a>

            <a href="{{ route('admin.costumer') }}"
               class="bg-[#1f1b3a] hover:bg-[#2b2650] border border-purple-800 px-5 py-3 rounded-xl text-white font-semibold transition">
                👥 Pelanggan
            </a>

        </div>

    </div>

    {{-- RINGKASAN ORDER --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">

        {{-- Total Order --}}
        <div class="bg-[#1f1b3a] border border-purple-800 rounded-2xl p-6 hover:border-purple-500 transition">

            <div class="flex justify-between items-start">

                <div>
                    <p class="text-gray-400 text-sm">
                        Total Order
                    </p>

                    <h2 class="text-4xl font-bold text-white mt-3">
                        {{ $totalOrder }}
                    </h2>

                    <p class="text-gray-500 text-xs mt-2">
                        Semua pesanan masuk
                    </p>
                </div>

                <div class="w-12 h-12 rounded-xl bg-purple-500/20 flex items-center justify-center text-2xl">
                    📦
                </div>

            </div>

        </div>

        {{-- Pending --}}
        <div class="bg-[#1f1b3a] border border-yellow-500/20 rounded-2xl p-6 hover:border-yellow-500/60 transition">

            <div class="flex justify-between items-start">

                <div>
                    <p class="text-gray-400 text-sm">
                        Pending
                    </p>

                    <h2 class="text-4xl font-bold text-yellow-400 mt-3">
                        {{ $orderPending }}
                    </h2>

                    <p class="text-gray-500 text-xs mt-2">
                        Menunggu konfirmasi
                    </p>
                </div>

                <div class="w-12 h-12 rounded-xl bg-yellow-500/15 flex items-center justify-center text-2xl">
                    ⏳
                </div>

            </div>

        </div>

        {{-- Diproses --}}
        <div class="bg-[#1f1b3a] border border-blue-500/20 rounded-2xl p-6 hover:border-blue-500/60 transition">

            <div class="flex justify-between items-start">

                <div>
                    <p class="text-gray-400 text-sm">
                        Diproses
                    </p>

                    <h2 class="text-4xl font-bold text-blue-400 mt-3">
                        {{ $orderDiproses }}
                    </h2>

                    <p class="text-gray-500 text-xs mt-2">
                        Sedang dikerjakan
                    </p>
                </div>

                <div class="w-12 h-12 rounded-xl bg-blue-500/15 flex items-center justify-center text-2xl">
                    ⚡
                </div>

            </div>

        </div>

        {{-- Selesai --}}
        <div class="bg-[#1f1b3a] border border-green-500/20 rounded-2xl p-6 hover:border-green-500/60 transition">

            <div class="flex justify-between items-start">

                <div>
                    <p class="text-gray-400 text-sm">
                        Order Selesai
                    </p>

                    <h2 class="text-4xl font-bold text-green-400 mt-3">
                        {{ $orderSelesai }}
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

    {{-- DATA MASTER --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

        <div class="bg-[#1f1b3a] border border-purple-800 rounded-2xl p-6 flex justify-between items-center">

            <div>
                <p class="text-gray-400 text-sm">
                    Total Pelanggan
                </p>

                <h2 class="text-3xl font-bold text-purple-400 mt-2">
                    {{ $totalPelanggan }}
                </h2>

                <a href="{{ route('admin.costumer') }}"
                   class="inline-block text-purple-300 hover:text-purple-200 text-sm font-semibold mt-3">
                    Kelola pelanggan →
                </a>
            </div>

            <div class="w-14 h-14 rounded-2xl bg-purple-500/20 flex items-center justify-center text-3xl">
                👥
            </div>

        </div>

        <div class="bg-[#1f1b3a] border border-purple-800 rounded-2xl p-6 flex justify-between items-center">

            <div>
                <p class="text-gray-400 text-sm">
                    Total Game
                </p>

                <h2 class="text-3xl font-bold text-red-400 mt-2">
                    {{ $totalGame }}
                </h2>

                <a href="{{ route('admin.kelolagame') }}"
                   class="inline-block text-purple-300 hover:text-purple-200 text-sm font-semibold mt-3">
                    Kelola game →
                </a>
            </div>

            <div class="w-14 h-14 rounded-2xl bg-red-500/15 flex items-center justify-center text-3xl">
                🎮
            </div>

        </div>

        <div class="bg-[#1f1b3a] border border-purple-800 rounded-2xl p-6 flex justify-between items-center">

            <div>
                <p class="text-gray-400 text-sm">
                    Total Artikel
                </p>

                <h2 class="text-3xl font-bold text-pink-400 mt-2">
                    {{ $totalArtikel }}
                </h2>

                <a href="{{ route('admin.kelolaartikel') }}"
                   class="inline-block text-purple-300 hover:text-purple-200 text-sm font-semibold mt-3">
                    Kelola artikel →
                </a>
            </div>

            <div class="w-14 h-14 rounded-2xl bg-pink-500/15 flex items-center justify-center text-3xl">
                📰
            </div>

        </div>

    </div>

    {{-- ORDER TERBARU --}}
    <div class="bg-[#1f1b3a] border border-purple-800 rounded-2xl overflow-hidden">

        <div class="p-6 border-b border-purple-800 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">

            <div>
                <h2 class="text-xl font-bold text-white">
                    Order Terbaru
                </h2>

                <p class="text-gray-400 text-sm mt-1">
                    Menampilkan pesanan terbaru dari pelanggan.
                </p>
            </div>

            <a href="{{ route('admin.kelolaorder') }}"
               class="text-purple-400 hover:text-purple-300 font-semibold text-sm">
                Lihat Semua →
            </a>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full text-left text-gray-300">

                <thead class="bg-[#2b2650] text-gray-400 text-sm">

                    <tr>
                        <th class="px-6 py-4">ID</th>
                        <th class="px-6 py-4">Pelanggan</th>
                        <th class="px-6 py-4">Game</th>
                        <th class="px-6 py-4">Tanggal</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($orderTerbaru as $order)

                        <tr class="border-t border-purple-900 hover:bg-[#2b2650]/50 transition">

                            <td class="px-6 py-4 font-semibold text-white">
                                #{{ $order->id }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="font-semibold text-white">
                                    {{ $order->user->name ?? '-' }}
                                </div>

                                <div class="text-xs text-gray-500 mt-1">
                                    {{ $order->user->email ?? '-' }}
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                {{ $order->game->nama_game ?? '-' }}
                            </td>

                            <td class="px-6 py-4 text-sm">
                                {{ $order->created_at->format('d M Y H:i') }}
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

                            <td class="px-6 py-4 text-center">

                                <a href="{{ route('admin.kelolaorder') }}"
                                   class="inline-flex bg-purple-600 hover:bg-purple-700 px-3 py-2 rounded-lg text-white text-sm font-semibold transition">
                                    Kelola
                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center py-12 text-gray-400">

                                <div class="text-4xl mb-3">
                                    📭
                                </div>

                                Belum ada order masuk.

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection