@extends('layouts.admin')

@section('content')

<!-- peringatan -->
    {{-- ALERT SUCCESS --}}
    @if(session('success'))
    <div class="bg-green-500/20 border border-green-500 text-green-300 p-4 rounded-xl">
        {{ session('success') }}
    </div>
    @endif

    {{-- ALERT ERROR --}}
    @if ($errors->any())
    <div class="bg-red-500/20 border border-red-500 text-red-300 p-4 rounded-xl">
        <ul class="list-disc ml-5">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
<div class="bg-[#1f1b3a] p-6 rounded-2xl border border-purple-800">

        <h2 class="text-xl font-bold text-white mb-5">
            Tambah Game Baru
        </h2>

        <form
            action="{{ route('admin.games.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- NAMA GAME -->
                <div>
                    <label class="text-gray-300">
                        Nama Game
                    </label>

                    <input
                        type="text"
                        name="nama_game"
                        value="{{ old('nama_game') }}"
                        placeholder="Contoh: Zenless Zone Zero"
                        required
                        class="w-full mt-2 bg-[#2b2650] text-white rounded-lg p-3 border border-purple-700 capitalize">
                </div>

                <!-- KATEGORI -->
                <div>
                    <label class="text-gray-300">
                        Kategori
                    </label>

                    <input
                        type="text"
                        name="kategori"
                        value="{{ old('kategori') }}"
                        placeholder="Contoh: Action RPG"
                        required
                        class="w-full mt-2 bg-[#2b2650] text-white rounded-lg p-3 border border-purple-700 capitalize">
                </div>

                <!-- STATUS -->
                <div>

                    <label class="text-gray-300">
                        Status
                    </label>

                    <select
                        name="status"
                        required
                        class="w-full mt-2 bg-[#2b2650] text-white rounded-lg p-3 border border-purple-700">

                        <option value="">Pilih Status</option>
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Nonaktif</option>

                    </select>

                </div>
                <!-- DESKRIPSI -->
                <div class="md:col-span-2">

                    <label class="text-gray-300">
                        Deskripsi
                    </label>

                    <textarea
                        name="deskripsi"
                        rows="4"
                        placeholder="Masukkan deskripsi game..."
                        class="w-full mt-2 bg-[#2b2650] text-white rounded-lg p-3 border border-purple-700">{{ old('deskripsi') }}</textarea>

                </div>

                <!-- THUMBNAIL -->
                <div>

                    <label class="text-gray-300">
                        Sampul Game
                    </label>

                    <input
                        type="file"
                        name="thumbnail"
                        accept="image/*"
                        required
                        class="w-full mt-2 bg-[#2b2650] text-white rounded-lg p-3 border border-purple-700">

                </div>

            </div>

           <div class="flex gap-4 mt-5">

                <button
                    type="submit"
                    class="w-40 inline-flex items-center justify-center bg-purple-600 hover:bg-purple-700 px-6 py-3 rounded-lg text-white font-semibold transition duration-200">
                    Simpan Game
                </button>

                <a href="{{ route('admin.kelolagame') }}"
                class="w-40 inline-flex items-center justify-center bg-gray-600 hover:bg-gray-700 px-6 py-3 rounded-lg text-white font-semibold transition duration-200">
                    Kembali
                </a>

            </div>
            

        </form>

    </div>
@endsection