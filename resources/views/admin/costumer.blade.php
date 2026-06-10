@extends('layouts.dashboard')

@section('title','Kelola Pelanggan')

@section('content')

<div class="flex justify-between items-center mb-8">

    <h1 class="text-3xl font-bold">
        Kelola Pelanggan
    </h1>

</div>

<div class="bg-[#16122D] rounded-3xl overflow-hidden">

    <table class="w-full">

        <thead>

            <tr class="bg-[#221B4B]">

                <th class="p-4 text-left">ID</th>
                <th class="text-left">Nama</th>
                <th class="text-left">Email</th>
                <th class="text-left">Total Order</th>
                <th class="text-left">Aksi</th>

            </tr>

        </thead>

        <tbody>

            <tr class="border-b border-purple-900">

                <td class="p-4">1</td>
                <td>Reisa</td>
                <td>reisa@gmail.com</td>
                <td>15</td>

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