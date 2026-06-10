@extends('layouts.admin')

@section('content')

<h1 class="text-4xl font-bold mb-6">

    Dashboard Admin

</h1>

<div class="grid grid-cols-4 gap-6">

    <div class="bg-white p-6 rounded-2xl shadow">

        <h2 class="text-gray-500">
            Total Pelanggan
        </h2>

        <p class="text-3xl font-bold mt-2">
            120
        </p>

    </div>

    <div class="bg-white p-6 rounded-2xl shadow">

        <h2 class="text-gray-500">
            Total Order
        </h2>

        <p class="text-3xl font-bold mt-2">
            80
        </p>

    </div>

    <div class="bg-white p-6 rounded-2xl shadow">

        <h2 class="text-gray-500">
            Penjoki Aktif
        </h2>

        <p class="text-3xl font-bold mt-2">
            12
        </p>

    </div>

    <div class="bg-white p-6 rounded-2xl shadow">

        <h2 class="text-gray-500">
            Pendapatan
        </h2>

        <p class="text-3xl font-bold mt-2">
            Rp 12jt
        </p>

    </div>

</div>

@endsection