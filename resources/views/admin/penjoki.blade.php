@extends('layouts.admin')


@section('content')

<div class="flex justify-between items-center mb-8">

    <h1 class="text-3xl font-bold">
        Kelola Penjoki
    </h1>

    <button
        class="bg-purple-600 px-5 py-3 rounded-xl">

        + Tambah Penjoki

    </button>

</div>

<div class="bg-[#16122D] rounded-3xl overflow-hidden">

    <table class="w-full">

        <thead>

            <tr class="bg-[#221B4B]">

                <th class="p-4 text-left">Nama</th>
                <th class="text-left">Game</th>
                <th class="text-left">Status</th>
                <th class="text-left">Aksi</th>

            </tr>

        </thead>

        <tbody>

            <tr class="border-b border-purple-900">

                <td class="p-4">
                    Penjoki A
                </td>

                <td>
                    Zenless Zone Zero
                </td>

                <td>

                    <span class="bg-green-500 text-black px-3 py-1 rounded-lg">
                        Aktif
                    </span>

                </td>

                <td>

                    <button class="bg-blue-500 px-3 py-1 rounded-lg">
                        Edit
                    </button>

                    <button class="bg-red-500 px-3 py-1 rounded-lg ml-2">
                        Hapus
                    </button>

                </td>

            </tr>

        </tbody>

    </table>

</div>

@endsection