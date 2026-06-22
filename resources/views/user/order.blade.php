@extends('layouts.user')

@section('content')
@if($errors->any())
<div id="errorPopup"
    class="fixed inset-0 bg-black/70 z-50 flex items-center justify-center px-4">

    <div class="bg-[#1f1b3a] border border-red-500 rounded-2xl p-6 max-w-md w-full shadow-2xl">

        <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 rounded-full bg-red-500/20 flex items-center justify-center text-red-400 text-xl">
                !
            </div>

            <h3 class="text-white font-bold text-lg">
                Data Pesanan Belum Lengkap
            </h3>
        </div>

        <ul class="text-red-300 text-sm space-y-2">
            @foreach($errors->all() as $error)
            <li>• {{ $error }}</li>
            @endforeach
        </ul>

        <button
            type="button"
            onclick="document.getElementById('errorPopup').remove()"
            class="mt-6 w-full bg-red-600 hover:bg-red-700 text-white py-3 rounded-xl">
            Mengerti
        </button>

    </div>
</div>
@endif
{{-- POPUP SUSPENDED --}}
@if(session('suspended'))
<div id="popup-overlay"
    style="position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 999;
            display: flex; align-items: center; justify-content: center;">

    <div style="background: #fff; border-radius: 12px; padding: 2rem 1.75rem;
                max-width: 380px; width: 90%; text-align: center; position: relative;">

        {{-- Ikon warning --}}
        <div style="width: 56px; height: 56px; border-radius: 50%; background: #fef2f2;
                    display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none"
                stroke="#ef4444" stroke-width="2" viewBox="0 0 24 24">
                <path d="M12 9v4m0 4h.01M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z" />
            </svg>
        </div>

        <h3 style="font-size: 1.1rem; font-weight: 600; color: #111827; margin: 0 0 0.5rem;">
            Tidak Dapat Melakukan Pesanan
        </h3>

        <p style="font-size: 0.875rem; color: #6b7280; margin: 0 0 1.5rem; line-height: 1.6;">
            Akun Anda sedang dalam status <strong style="color: #ef4444;">suspend</strong>.
            Silakan hubungi admin untuk informasi lebih lanjut.
        </p>

        <button onclick="document.getElementById('popup-overlay').style.display='none'"
            style="background: #111827; color: #fff; border: none; border-radius: 8px;
                       padding: 0 24px; height: 38px; font-size: 0.875rem;
                       font-weight: 500; cursor: pointer; width: 100%;">
            Mengerti
        </button>

    </div>
</div>
@endif

{{-- FORM PESANAN --}}
<div class="max-w-3xl mx-auto py-10 px-4">

    <div class="bg-[#1f1b3a] rounded-3xl shadow-xl border border-purple-800 overflow-hidden">

        <!-- Header -->
        <div class="bg-gradient-to-r from-purple-700 to-purple-900 p-6">

            <h1 class="text-3xl font-bold text-white">
                🎮 Buat Pesanan Joki
            </h1>

            <p class="text-purple-200 mt-2">
                Lengkapi data berikut untuk melakukan pemesanan.
            </p>

        </div>

        <!-- Form -->
        <form
            action="{{ route('user.order.store') }}"
            method="POST"
            class="p-8 space-y-6">

            @csrf

            <!-- Nama -->
            <div>
                <label class="block text-gray-300 mb-2">
                    Nama
                </label>

                <input
                    type="text"
                    value="{{ auth()->user()->name }}"
                    readonly
                    class="w-full bg-[#2b2650] text-gray-400 p-4 rounded-xl">
            </div>

            <!-- Email -->
            <div>
                <label class="block text-gray-300 mb-2">
                    Email
                </label>

                <input
                    type="text"
                    value="{{ auth()->user()->email }}"
                    readonly
                    class="w-full bg-[#2b2650] text-gray-400 p-4 rounded-xl">
            </div>

            <!-- Game -->
            <div>

                <label class="block text-gray-300 mb-2">
                    Pilih Game
                </label>

                <select name="game_id" class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-800" required>
                    <option value="">-- Pilih Game --</option>

                    @foreach($games as $game)
                    <option
                        value="{{ $game->id }}"
                        {{ old('game_id', request('game_id')) == $game->id ? 'selected' : '' }}>
                        {{ $game->nama_game }}
                    </option>
                    @endforeach
                </select>
                @error('game_id')
                <p class="text-red-500 text-sm mt-2">
                    {{ $message }}
                </p>
                @enderror

            </div>

            <!-- Nomor HP -->
            <div>

                <label class="block text-gray-300 mb-2">
                    Nomor WhatsApp
                </label>

                <input
                    type="text"
                    name="nomor_hp"
                    value="{{ old('nomor_hp') }}"
                    placeholder="08xxxxxxxxxx"
                    required
                    minlength="10"
                    maxlength="15"
                    pattern="[0-9]+"
                    oninvalid="this.setCustomValidity('Nomor HP wajib diisi')"
                    oninput="this.setCustomValidity('')"
                    class="w-full bg-[#2b2650] text-white p-4 rounded-xl border
                {{ $errors->has('nomor_hp') ? 'border-red-500' : 'border-purple-800' }}">
                @error('nomor_hp')
                <p class="text-red-400 text-sm mt-2">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <!-- Tombol -->
            <button
                type="submit"
                class="w-full bg-purple-600 hover:bg-purple-700 transition duration-300 text-white font-semibold py-4 rounded-xl">

                🚀 Buat Pesanan

            </button>

        </form>

    </div>

</div>


@endsection