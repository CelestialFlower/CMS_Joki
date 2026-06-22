
@extends('layouts.admin')

@section('content')
<div class="p-6">

    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-white">
            📦 Kelola Order
        </h1>
        <p class="text-gray-400">
            Kelola seluruh pesanan joki pelanggan
        </p>
    </div>

    <!-- Statistik -->
    <div class="grid md:grid-cols-4 gap-4 mb-8">
        <div class="bg-[#1c1736] rounded-2xl p-5 text-white shadow-lg">
            <h3 class="text-sm">Total Order </h3>
            <p class="text-3xl font-bold">({{ $orders->count() }})</p>
        </div>
        
        <div class="bg-yellow-500 rounded-2xl p-5 text-white shadow-lg">
            <h3 class="text-sm">Pending </h3>
            <p class="text-3xl font-bold">({{ $pending }})</p>
        </div>

        <div class="bg-blue-500 rounded-2xl p-5 text-white shadow-lg">
            <h3 class="text-sm">Diproses </h3>
            <p class="text-3xl font-bold">({{ $proses }})</p>
        </div>

        <div class="bg-green-500 rounded-2xl p-5 text-white shadow-lg">
            <h3 class="text-sm">Selesai </h3>
            <p class="text-3xl font-bold">({{ $selesai }})</p>
        </div>

        <div class="bg-red-500 rounded-2xl p-5 text-white shadow-lg">
            <h3 class="text-sm">Dibatalkan ({{ $dibatalkan }})</h3>
            <p class="text-3xl font-bold">({{ $dibatalkan }})</p>
        </div>

    </div>

    <!-- Filter -->
    <form method="GET" action="{{ route('admin.kelolaorder') }}">
    <select
        name="status"
        onchange="this.form.submit()"
        class="bg-[#2a2352] text-white px-4 py-2 rounded-xl border border-gray-600">

        <option value="semua"
            {{ request('status') == 'semua' || request('status') == '' ? 'selected' : '' }}>
            Semua
        </option>

        <option value="pending"
            {{ request('status') == 'pending' ? 'selected' : '' }}>
            Pending
        </option>

        <option value="proses"
            {{ request('status') == 'proses' ? 'selected' : '' }}>
            Diproses
        </option>

        <option value="selesai"
            {{ request('status') == 'selesai' ? 'selected' : '' }}>
            Selesai
        </option>

        <option value="dibatalkan"
            {{ request('status') == 'dibatalkan' ? 'selected' : '' }}>
            Dibatalkan
        </option>

    </select>
</form>
    <!-- Tabel Order -->
    <div class="bg-[#1c1736] rounded-2xl overflow-hidden shadow-lg">

        <div class="p-5 border-b border-gray-700">
            <h2 class="text-xl font-semibold text-white">
                Daftar Order
            </h2>
        </div>

        <div class="overflow-x-auto">

            <table class="w-full text-left text-gray-300">

                <thead class="bg-[#2a2352]">

                    <tr>
                        <th class="px-6 py-4">ID</th>
                        <th class="px-6 py-4">Pelanggan</th>
                        <th class="px-6 py-4">Email</th>
                        <th class="px-6 py-4">Nomor HP</th>
                        <th class="px-6 py-4">Game</th>
                        <th class="px-6 py-4">Tanggal Order</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Aksi</th>
                    </tr>

                </thead>

                <tbody>

@forelse($orders as $order)

<tr class="border-b border-gray-700 hover:bg-[#241d46]">

    <td class="px-6 py-4">
        #{{ $order->id }}
    </td>

    <td class="px-6 py-4">
        {{ $order->user->name }}
    </td>
    <td class="px-6 py-4">
        {{ $order->user->email }}
    </td>
    <td class="px-6 py-4">
        {{ $order->nomor_hp }}
    </td>

    <td class="px-6 py-4">
        {{ $order->game->nama_game }}
    </td>


    <td class="px-6 py-4">
        {{ $order->created_at->format('d M Y') }}
    </td>

    
    <td class="px-6 py-4">

        @if($order->status == 'pending')

            <span class="bg-yellow-500 px-3 py-1 rounded-full text-sm text-white">
                Pending
            </span>

        @elseif($order->status == 'proses')

            <span class="bg-blue-500 px-3 py-1 rounded-full text-sm text-white">
                Diproses
            </span>

        @elseif($order->status == 'selesai')

            <span class="bg-green-500 px-3 py-1 rounded-full text-sm text-white">
                Selesai
            </span>

        @else

            <span class="bg-red-500 px-3 py-1 rounded-full text-sm text-white">
                Dibatalkan
            </span>

        @endif

    </td>


    <td class="px-6 py-4">

                        <form action="{{ route('admin.order.update',$order->id) }}"
                    method="POST">

                    @csrf
                    @method('PUT')

                    <select name="status"
                            class="bg-[#2a2352] text-white rounded-lg p-2">

                        <option value="pending"
                            {{ $order->status=='pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                        <option value="proses"
                            {{ $order->status=='proses' ? 'selected' : '' }}>
                            Diproses
                        </option>

                        <option value="selesai"
                            {{ $order->status=='selesai' ? 'selected' : '' }}>
                            Selesai
                        </option>

                        <option value="dibatalkan"
                            {{ $order->status=='dibatalkan' ? 'selected' : '' }}>
                            Dibatalkan
                        </option>

                    </select>

                    <button class="bg-green-600 px-3 py-2 rounded-lg mt-2">
                        Simpan
                    </button>

                </form>

    </td>

</tr>

@empty

<tr>

    <td colspan="8"
        class="text-center py-8 text-gray-400">

        Belum ada order

    </td>

</tr>

@endforelse

</tbody>

            </table>

        </div>

    </div>

</div>
@endsection