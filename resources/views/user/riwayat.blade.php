@extends('layouts.user')
@section('content')
<div class="container mx-auto px-6 py-8">

    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-4xl font-bold text-gray-800">
                Riwayat Order
            </h1>
            <p class="text-gray-500">
                Lihat seluruh pesanan joki yang pernah dibuat.
            </p>
        </div>

        <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-lg">
            + Buat Order Baru
        </button>
    </div>

    <!-- Filter -->
    <div class="bg-white rounded-2xl shadow-md p-5 mb-6">
        <div class="grid md:grid-cols-3 gap-4">
            <input
                type="text"
                placeholder="Cari Order ID..."
                class="border rounded-lg px-4 py-3"
            >

            <select class="border rounded-lg px-4 py-3">
                <option>Semua Game</option>
                <option>Mobile Legends</option>
                <option>Genshin Impact</option>
                <option>Honkai Star Rail</option>
                <option>Zenless Zone Zero</option>
            </select>

            <select class="border rounded-lg px-4 py-3">
                <option>Semua Status</option>
                <option>Pending</option>
                <option>Diproses</option>
                <option>Selesai</option>
            </select>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">

        <table class="w-full text-gray-800">

            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="p-4 text-left">Order ID</th>
                    <th class="p-4 text-left">Game</th>
                    <th class="p-4 text-left">Layanan</th>
                    <th class="p-4 text-left">Harga</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-left">Tanggal</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>

                <!-- Dummy Data 1 -->
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-4 font-semibold">#ORD001</td>
                    <td class="p-4">Mobile Legends</td>
                    <td class="p-4">Rank Mythic</td>
                    <td class="p-4">Rp150.000</td>
                    <td class="p-4">
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">
                            Selesai
                        </span>
                    </td>
                    <td class="p-4">15 Juni 2026</td>
                    <td class="p-4 text-center">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-lg">
                            Detail
                        </button>
                    </td>
                </tr>

                <!-- Dummy Data 2 -->
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-4 font-semibold">#ORD002</td>
                    <td class="p-4">Genshin Impact</td>
                    <td class="p-4">Abyss Clear</td>
                    <td class="p-4">Rp75.000</td>
                    <td class="p-4">
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">
                            Pending
                        </span>
                    </td>
                    <td class="p-4">16 Juni 2026</td>
                    <td class="p-4 text-center">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-lg">
                            Detail
                        </button>
                    </td>
                </tr>

                <!-- Dummy Data 3 -->
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-4 font-semibold">#ORD003</td>
                    <td class="p-4">Zenless Zone Zero</td>
                    <td class="p-4">Leveling Account</td>
                    <td class="p-4">Rp250.000</td>
                    <td class="p-4">
                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full">
                            Diproses
                        </span>
                    </td>
                    <td class="p-4">16 Juni 2026</td>
                    <td class="p-4 text-center">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-lg">
                            Detail
                        </button>
                    </td>
                </tr>

            </tbody>

        </table>

    </div>

</div>

@endsection