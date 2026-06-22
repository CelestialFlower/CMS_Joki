@extends('layouts.user')

@section('content')

<div class="max-w-6xl mx-auto">

    <div class="flex justify-between items-center mb-8">

        <div>
            <h1 class="text-3xl font-bold text-white">
                📦 Status Order Saya
            </h1>

            <p class="text-gray-400 mt-2">
                Pantau status pesanan joki kamu di sini.
            </p>
        </div>

        <a href="{{ route('user.order') }}"
           class="bg-purple-600 hover:bg-purple-700 px-5 py-3 rounded-xl text-white font-semibold">
            + Buat Order
        </a>

    </div>

    {{-- NOTIFIKASI --}}
    @if(session('success'))
        <div class="mb-5 bg-green-500/20 border border-green-500 text-green-300 px-5 py-4 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-5 bg-red-500/20 border border-red-500 text-red-300 px-5 py-4 rounded-xl">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-[#16122D] rounded-3xl overflow-hidden border border-purple-900">

        <div class="p-6 border-b border-purple-900">
            <h2 class="text-xl font-bold text-white">
                Riwayat Pesanan
            </h2>
        </div>

        <div class="overflow-x-auto">

            <table class="w-full text-left text-gray-300">

                <thead class="bg-[#211B42] text-white">

                    <tr>
                        <th class="px-6 py-4">ID</th>
                        <th class="px-6 py-4">Game</th>
                        <th class="px-6 py-4">Nomor HP</th>
                        <th class="px-6 py-4">Tanggal Order</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($orders as $order)

                    <tr class="border-b border-purple-900 hover:bg-[#211B42]">

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
                            {{ $order->created_at->format('d M Y H:i') }}
                        </td>

                        <td class="px-6 py-4">

                            @if($order->status == 'pending')

                                <span class="bg-yellow-500/20 text-yellow-400 px-3 py-1 rounded-full text-sm">
                                    Pending
                                </span>

                            @elseif($order->status == 'proses')

                                <span class="bg-blue-500/20 text-blue-400 px-3 py-1 rounded-full text-sm">
                                    Diproses
                                </span>

                            @elseif($order->status == 'selesai')

                                <span class="bg-green-500/20 text-green-400 px-3 py-1 rounded-full text-sm">
                                    Selesai
                                </span>

                            @else

                                <span class="bg-red-500/20 text-red-400 px-3 py-1 rounded-full text-sm">
                                    Dibatalkan
                                </span>

                            @endif

                        </td>

                        <td class="px-6 py-4">

                            @if($order->status == 'pending')

                                <div class="flex justify-center gap-2">

                                    <a href="{{ route('user.order.edit', $order->id) }}"
   class="bg-blue-600 hover:bg-blue-700 px-3 py-2 rounded-lg text-white text-sm">
    Edit
</a>

                                    <form action="{{ route('user.order.destroy', $order->id) }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            onclick="return confirm('Yakin ingin menghapus order ini?')"
                                            class="bg-red-600 hover:bg-red-700 px-3 py-2 rounded-lg text-white text-sm">
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            @else

                                <span class="text-gray-500 text-sm block text-center">
                                    Tidak dapat dimodifikasi
                                </span>

                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="6" class="text-center py-12 text-gray-400">
                            Belum ada pesanan.
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection