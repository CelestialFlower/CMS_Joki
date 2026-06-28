@extends('layouts.admin')

@section('content')
{{-- ALERT SUCCESS --}}
@if(session('success'))
<div class="bg-green-500/20 border border-green-500 text-green-300 p-4 rounded-xl mb-4">
    {{ session('success') }}
</div>
@endif

{{-- ALERT ERROR --}}
@if($errors->any())
<div class="bg-red-500/20 border border-red-500 text-red-300 p-4 rounded-xl mb-4">
    <p class="font-semibold mb-2">Gagal menyimpan artikel!</p>
    <ul class="list-disc ml-5">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="bg-[#1f1b3a] p-6 rounded-2xl border border-purple-800">
    <form
        action="{{ route('admin.artikel.store') }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf

        <div class="grid md:grid-cols-2 gap-4">

            <!-- PILIH GAME -->
            <select
                name="game_id"
                required
                class="bg-[#2b2650] text-white p-3 rounded-lg">

                <option value="">
                    Pilih Game
                </option>

                @foreach($games as $game)

                <option value="{{ $game->id }}">
                    {{ $game->nama_game }}
                </option>

                @endforeach

            </select>

            <!-- JUDUL -->
            <input
                type="text"
                name="judul"
                placeholder="Judul Artikel"
                required
                class="bg-[#2b2650] text-white p-3 rounded-lg capitalize">

        </div>

        <textarea
            name="isi"
            rows="8"
            placeholder="Isi Artikel..."
            required
            class="w-full mt-4 bg-[#2b2650] text-white p-3 rounded-lg"></textarea>

        <input
            type="file"
            name="thumbnail"
            class="mt-4 text-white">

        <select
            name="status"
            class="mt-4 bg-[#2b2650] text-white p-3 rounded-lg">

            <option value="publish">
                Publish
            </option>

            <option value="draft">
                Draft
            </option>

        </select>

        <button
            class="mt-4 bg-purple-600 px-5 py-3 rounded-lg text-white">

            Simpan Artikel

        </button>
        <a href="{{ route('admin.kelolaartikel') }}"
                class="w-40 inline-flex items-center justify-center bg-gray-600 hover:bg-gray-700 px-6 py-3 rounded-lg text-white font-semibold transition duration-200">
                    Kembali
         </a>

    </form>
    
</div>
@endsection