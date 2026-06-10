@extends('layouts.user')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Buat Order Joki
</h1>

<div class="bg-white p-6 rounded-2xl shadow">

    <form>

        <div class="mb-4">

            <label>Game</label>

            <input
                type="text"
                class="w-full border rounded-lg p-3 mt-2">

        </div>

        <div class="mb-4">

            <label>Detail Order</label>

            <textarea
                class="w-full border rounded-lg p-3 mt-2">
            </textarea>

        </div>

        <button
            class="bg-indigo-600 text-white px-6 py-3 rounded-lg">

            Kirim Order

        </button>

    </form>

</div>

@endsection