@extends('layouts.admin')

@section('content')

<div class="space-y-6">

    <!-- HEADER -->
    <div class="flex justify-between items-center">

        <div>
            <h1 class="text-3xl font-bold text-white">
                Kelola Artikel
            </h1>

            <p class="text-gray-400">
                Kelola seluruh artikel website Joki CSstore
            </p>
        </div>

        <button
            class="bg-purple-600 hover:bg-purple-700 px-5 py-3 rounded-xl text-white font-semibold transition">
            + Tambah Artikel
        </button>

    </div>

    <!-- STATISTIC -->
    <div class="grid md:grid-cols-3 gap-6">

        <div class="bg-[#1f1b3a] border border-purple-800 rounded-2xl p-6">
            <p class="text-gray-400">Total Artikel</p>
            <h2 class="text-3xl font-bold text-white mt-2">24</h2>
        </div>

        <div class="bg-[#1f1b3a] border border-purple-800 rounded-2xl p-6">
            <p class="text-gray-400">Published</p>
            <h2 class="text-3xl font-bold text-green-400 mt-2">18</h2>
        </div>

        <div class="bg-[#1f1b3a] border border-purple-800 rounded-2xl p-6">
            <p class="text-gray-400">Draft</p>
            <h2 class="text-3xl font-bold text-yellow-400 mt-2">6</h2>
        </div>

    </div>

    <!-- FILTER -->
    <div class="bg-[#1f1b3a] border border-purple-800 rounded-2xl p-5">

        <div class="grid md:grid-cols-3 gap-4">

            <input
                type="text"
                placeholder="Cari judul artikel..."
                class="bg-[#2b2650] border border-purple-700 rounded-xl px-4 py-3 text-white">

            <select
                class="bg-[#2b2650] border border-purple-700 rounded-xl px-4 py-3 text-white">
                <option>Semua Status</option>
                <option>Published</option>
                <option>Draft</option>
            </select>

            <button
                class="bg-purple-600 hover:bg-purple-700 rounded-xl text-white font-semibold">
                Cari
            </button>

        </div>

    </div>

    <!-- TABLE -->
    <div class="bg-[#1f1b3a] border border-purple-800 rounded-2xl overflow-hidden">

        <table class="w-full">

            <thead class="bg-purple-700 text-white">

                <tr>
                    <th class="p-4 text-left">ID</th>
                    <th class="p-4 text-left">Judul</th>
                    <th class="p-4 text-left">Kategori</th>
                    <th class="p-4 text-left">Penulis</th>
                    <th class="p-4 text-left">Tanggal</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>

            </thead>

            <tbody class="text-white">

                <tr class="border-b border-purple-900">

                    <td class="p-4">1</td>
                    <td class="p-4">
                        Tips Push Rank Mobile Legends Cepat Mythic
                    </td>
                    <td class="p-4">Mobile Legends</td>
                    <td class="p-4">Admin</td>
                    <td class="p-4">16 Juni 2026</td>

                    <td class="p-4">
                        <span
                            class="bg-green-500/20 text-green-400 px-3 py-1 rounded-full">
                            Published
                        </span>
                    </td>

                    <td class="p-4">

                        <div class="flex justify-center gap-2">

                            <button
                                class="bg-blue-600 hover:bg-blue-700 px-3 py-2 rounded-lg text-sm">
                                Edit
                            </button>

                            <button
                                class="bg-yellow-600 hover:bg-yellow-700 px-3 py-2 rounded-lg text-sm">
                                Preview
                            </button>

                            <button
                                class="bg-red-600 hover:bg-red-700 px-3 py-2 rounded-lg text-sm">
                                Hapus
                            </button>

                        </div>

                    </td>

                </tr>

                <tr>

                    <td class="p-4">2</td>
                    <td class="p-4">
                        Cara Build Ellen Joe Terbaik ZZZ
                    </td>
                    <td class="p-4">Zenless Zone Zero</td>
                    <td class="p-4">Admin</td>
                    <td class="p-4">15 Juni 2026</td>

                    <td class="p-4">
                        <span
                            class="bg-yellow-500/20 text-yellow-400 px-3 py-1 rounded-full">
                            Draft
                        </span>
                    </td>

                    <td class="p-4">

                        <div class="flex justify-center gap-2">

                            <button
                                class="bg-blue-600 hover:bg-blue-700 px-3 py-2 rounded-lg text-sm">
                                Edit
                            </button>

                            <button
                                class="bg-yellow-600 hover:bg-yellow-700 px-3 py-2 rounded-lg text-sm">
                                Preview
                            </button>

                            <button
                                class="bg-red-600 hover:bg-red-700 px-3 py-2 rounded-lg text-sm">
                                Hapus
                            </button>

                        </div>

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

</div>
@endsection