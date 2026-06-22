
@extends('layouts.user')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="bg-[#16122D] rounded-3xl p-8 shadow-xl">

        <div class="mb-8">

            <h2 class="text-3xl font-bold text-white">
                Edit Pesanan Joki
            </h2>

            <p class="text-gray-400 mt-2">
                Kamu hanya bisa mengubah pesanan selama status masih pending.
            </p>

        </div>

        {{-- ERROR VALIDASI --}}
        @if ($errors->any())

            <div class="bg-red-500/20 border border-red-500 text-red-300 p-4 rounded-xl mb-6">

                <ul class="list-disc ml-5">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form
            action="{{ route('user.order.update', $order->id) }}"
            method="POST">

            @csrf
            @method('PUT')

            {{-- GAME --}}
            <div class="mb-5">

                <label class="text-white font-semibold">
                    Pilih Game
                </label>

                <select
                    name="game_id"
                    class="w-full mt-2 p-4 rounded-xl bg-[#0F0C24] text-white border border-purple-800">

                    @foreach($games as $game)

                        <option
                            value="{{ $game->id }}"
                            {{ old('game_id', $order->game_id) == $game->id ? 'selected' : '' }}>

                            {{ $game->nama_game }}

                        </option>

                    @endforeach

                </select>

            </div>

            {{-- NOMOR HP --}}
            <div class="mb-5">

                <label class="text-white font-semibold">
                    Nomor HP
                </label>

                <input
                    type="text"
                    name="nomor_hp"
                    value="{{ old('nomor_hp', $order->nomor_hp) }}"
                    placeholder="Contoh: 081234567890"
                    class="w-full mt-2 p-4 rounded-xl bg-[#0F0C24] text-white border border-purple-800">

            </div>

            {{-- STATUS --}}
            <div class="mb-6">

                <label class="text-white font-semibold">
                    Status Pesanan
                </label>

                <input
                    type="text"
                    value="{{ ucfirst($order->status) }}"
                    readonly
                    class="w-full mt-2 p-4 rounded-xl bg-gray-700 text-gray-300 border border-gray-600">

            </div>

            <div class="flex gap-4">

                <button
                    type="submit"
                    class="bg-purple-600 hover:bg-purple-700 px-7 py-3 rounded-xl text-white font-semibold">

                    Simpan Perubahan

                </button>

                <a
    href="{{ url('/user/status-order') }}"
    class="bg-gray-700 hover:bg-gray-600 px-7 py-3 rounded-xl text-white font-semibold">
    Batal
</a>

            </div>

        </form>

    </div>

</div>

@endsection