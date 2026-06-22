@extends('layouts.user')

@section('content')

<div class="max-w-6xl mx-auto">

    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">

        <div>
            <h1 class="text-3xl font-bold text-white">
                ✅ Riwayat Order Selesai
            </h1>

            <p class="text-gray-400 mt-2">
                Daftar pesanan joki yang telah selesai dikerjakan.
            </p>
        </div>

        <div class="flex gap-3">
            <a href="{{ route('user.status-order') }}"
               class="bg-[#2b2650] hover:bg-[#393266] px-5 py-3 rounded-xl text-white font-semibold transition">
                Pesanan Aktif
            </a>

            <a href="{{ route('user.order') }}"
               class="bg-purple-600 hover:bg-purple-700 px-5 py-3 rounded-xl text-white font-semibold transition">
                + Buat Order
            </a>
        </div>

    </div>

    {{-- NOTIFIKASI --}}
    @if(session('success'))
        <div class="mb-5 bg-green-500/20 border border-green-500 text-green-300 px-5 py-4 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-[#16122D] rounded-3xl overflow-hidden border border-purple-900">

        <div class="p-6 border-b border-purple-900">
            <h2 class="text-xl font-bold text-white">
                Pesanan Selesai
            </h2>

            <p class="text-sm text-gray-400 mt-1">
                Menampilkan seluruh order dengan status selesai.
            </p>
        </div>

        <div class="overflow-x-auto">

            <table class="w-full text-left text-gray-300">

                <thead class="bg-[#211B42] text-white">
                    <tr>
                        <th class="px-6 py-4">ID</th>
                        <th class="px-6 py-4">Game</th>
                        <th class="px-6 py-4">Nomor HP</th>
                        <th class="px-6 py-4">Tanggal Order</th>
                        <th class="px-6 py-4">Tanggal Selesai</th>
                        <th class="px-6 py-4">Status</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($orders as $order)

                        <tr class="border-b border-purple-900 hover:bg-[#211B42] transition">

                            <td class="px-6 py-4 font-semibold text-white">
                                #{{ $order->id }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $order->game->nama_game ?? '-' }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $order->nomor_hp }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $order->created_at ? $order->created_at->format('d M Y H:i') : '-' }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $order->updated_at ? $order->updated_at->format('d M Y H:i') : '-' }}
                            </td>

                            <td class="px-6 py-4">
                                <span class="bg-green-500/20 text-green-400 px-3 py-1 rounded-full text-sm font-semibold">
                                    Selesai
                                </span>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center py-14 text-gray-400">
                                <div class="text-4xl mb-3">📭</div>
                                Belum ada pesanan yang selesai.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection