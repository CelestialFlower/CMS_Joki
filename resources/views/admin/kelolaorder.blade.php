
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

        <div class="bg-yellow-500 rounded-2xl p-5 text-white shadow-lg">
            <h3 class="text-sm">Pending</h3>
            <p class="text-3xl font-bold">12</p>
        </div>

        <div class="bg-blue-500 rounded-2xl p-5 text-white shadow-lg">
            <h3 class="text-sm">Diproses</h3>
            <p class="text-3xl font-bold">8</p>
        </div>

        <div class="bg-green-500 rounded-2xl p-5 text-white shadow-lg">
            <h3 class="text-sm">Selesai</h3>
            <p class="text-3xl font-bold">45</p>
        </div>

        <div class="bg-red-500 rounded-2xl p-5 text-white shadow-lg">
            <h3 class="text-sm">Dibatalkan</h3>
            <p class="text-3xl font-bold">3</p>
        </div>

    </div>

    <!-- Filter -->
    <div class="bg-[#1c1736] rounded-2xl p-4 mb-5">

        <div class="flex flex-wrap gap-3">

            <button class="px-4 py-2 bg-purple-600 text-white rounded-xl">
                Semua
            </button>

            <button class="px-4 py-2 bg-yellow-500 text-white rounded-xl">
                Pending
            </button>

            <button class="px-4 py-2 bg-blue-500 text-white rounded-xl">
                Diproses
            </button>

            <button class="px-4 py-2 bg-green-500 text-white rounded-xl">
                Selesai
            </button>

            <button class="px-4 py-2 bg-red-500 text-white rounded-xl">
                Dibatalkan
            </button>

        </div>

    </div>

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
                        <th class="px-6 py-4">Game</th>
                        <th class="px-6 py-4">Layanan</th>
                        <th class="px-6 py-4">Harga</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Penjoki</th>
                        <th class="px-6 py-4">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    <tr class="border-b border-gray-700 hover:bg-[#241d46]">

                        <td class="px-6 py-4">#001</td>
                        <td class="px-6 py-4">Reisa</td>
                        <td class="px-6 py-4">Genshin Impact</td>
                        <td class="px-6 py-4">Abyss Full Star</td>
                        <td class="px-6 py-4">Rp 150.000</td>

                        <td class="px-6 py-4">
                            <span class="bg-yellow-500 px-3 py-1 rounded-full text-sm text-white">
                                Pending
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            Belum Ditugaskan
                        </td>

                        <td class="px-6 py-4 flex gap-2">

                            <button class="bg-indigo-600 hover:bg-indigo-700 px-3 py-2 rounded-lg text-white">
                                Detail
                            </button>

                            <button class="bg-green-600 hover:bg-green-700 px-3 py-2 rounded-lg text-white">
                                Ubah Status
                            </button>

                        </td>

                    </tr>

                    <tr class="hover:bg-[#241d46]">

                        <td class="px-6 py-4">#002</td>
                        <td class="px-6 py-4">Akbar</td>
                        <td class="px-6 py-4">Wuthering Waves</td>
                        <td class="px-6 py-4">Tower Clear</td>
                        <td class="px-6 py-4">Rp 100.000</td>

                        <td class="px-6 py-4">
                            <span class="bg-blue-500 px-3 py-1 rounded-full text-sm text-white">
                                Diproses
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            Rizky
                        </td>

                        <td class="px-6 py-4 flex gap-2">

                            <button class="bg-indigo-600 hover:bg-indigo-700 px-3 py-2 rounded-lg text-white">
                                Detail
                            </button>

                            <button class="bg-green-600 hover:bg-green-700 px-3 py-2 rounded-lg text-white">
                                Ubah Status
                            </button>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>
@endsection