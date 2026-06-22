@extends('layouts.admin')

@section('content')

<div class="space-y-8">

    <div>
        <h1 class="text-3xl font-bold text-white">
            Dashboard Admin
        </h1>

        <p class="text-gray-400 mt-2">
            Selamat datang di panel admin JOKI CSStore
        </p>
    </div>

    <!-- Statistik -->
    <div class="grid md:grid-cols-4 gap-6">

        <div class="bg-[#1f1b3a] rounded-2xl p-6 border border-purple-800">
            <p class="text-gray-400">Total Order</p>
            <h2 class="text-4xl font-bold text-white mt-3">
                {{ $totalOrder }}
            </h2>
        </div>

        <div class="bg-[#1f1b3a] rounded-2xl p-6 border border-purple-800">
            <p class="text-gray-400">Pending</p>
            <h2 class="text-4xl font-bold text-yellow-400 mt-3">
                {{ $orderPending }}
            </h2>
        </div>

        <div class="bg-[#1f1b3a] rounded-2xl p-6 border border-purple-800">
            <p class="text-gray-400">Diproses</p>
            <h2 class="text-4xl font-bold text-blue-400 mt-3">
                {{ $orderDiproses }}
            </h2>
        </div>

        <div class="bg-[#1f1b3a] rounded-2xl p-6 border border-purple-800">
            <p class="text-gray-400">Selesai</p>
            <h2 class="text-4xl font-bold text-green-400 mt-3">
                {{ $orderSelesai }}
            </h2>
        </div>

        <div class="bg-[#1f1b3a] rounded-2xl p-6 border border-purple-800">
            <p class="text-gray-400">Pelanggan</p>
            <h2 class="text-4xl font-bold text-purple-400 mt-3">
                {{ $totalPelanggan }}
            </h2>
        </div>

        <div class="bg-[#1f1b3a] rounded-2xl p-6 border border-purple-800">
            <p class="text-gray-400">Game</p>
            <h2 class="text-4xl font-bold text-red-400 mt-3">
                {{ $totalGame }}
            </h2>
        </div>

        <div class="bg-[#1f1b3a] rounded-2xl p-6 border border-purple-800">
            <p class="text-gray-400">Artikel</p>
            <h2 class="text-4xl font-bold text-pink-400 mt-3">
                {{ $totalArtikel }}
            </h2>
        </div>

    </div>

    <!-- Order Terbaru -->
    <div class="bg-[#1f1b3a] rounded-2xl overflow-hidden">

        <div class="p-5 border-b border-purple-800">
            <h2 class="text-xl text-white font-bold">
                Order Terbaru
            </h2>
        </div>

        <table class="w-full text-white">

            <thead class="bg-purple-700">

                <tr>
                    <th class="p-4">ID</th>
                    <th class="p-4">Pelanggan</th>
                    <th class="p-4">Game</th>
                    <th class="p-4">Status</th>
                </tr>

            </thead>

            <tbody>

                @forelse($orderTerbaru as $order)

                <tr class="border-b border-purple-900">

                    <td class="p-4">
                        #{{ $order->id }}
                    </td>

                    <td class="p-4">
                        {{ $order->user->name }}
                    </td>

                    <td class="p-4">
                        {{ $order->game->nama_game }}
                    </td>

                    <td class="p-4">

                        @if($order->status=='pending')

                            <span class="bg-yellow-500/20 text-yellow-400 px-3 py-1 rounded-full">
                                Pending
                            </span>

                        @elseif($order->status=='proses')

                            <span class="bg-blue-500/20 text-blue-400 px-3 py-1 rounded-full">
                                Diproses
                            </span>

                        @else

                            <span class="bg-green-500/20 text-green-400 px-3 py-1 rounded-full">
                                Selesai
                            </span>

                        @endif

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="4"
                        class="text-center py-8 text-gray-400">

                        Belum ada order

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection