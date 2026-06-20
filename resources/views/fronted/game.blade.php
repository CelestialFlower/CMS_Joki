@php
    use Illuminate\Support\Str;
@endphp
@extends('layouts.front')

@section('content')

<section class="container mx-auto px-6 py-10">

    <div class="mb-8">
        <h1 class="text-4xl font-bold text-white">
            🎮 Pilih Game
        </h1>

        <p class="text-gray-400 mt-2">
            Pilih game favoritmu dan lihat layanan joki yang tersedia.
        </p>
    </div>

    <!-- GRID GAME -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        @forelse($games as $game)

        <div class="bg-[#2b2650] rounded-2xl overflow-hidden shadow-lg hover:scale-105 transition duration-300">

            @if($game->thumbnail)

                <img
                    src="{{ asset('storage/'.$game->thumbnail) }}"
                    class="w-full h-48 object-cover">

            @else

                <img
                    src="https://placehold.co/400x220?text=No+Image"
                    class="w-full h-48 object-cover">

            @endif

            <div class="p-4">

                <h3 class="text-white font-bold text-lg">
                    {{ $game->nama_game }}
                </h3>

                <p class="text-gray-400 text-sm mt-2">
                    {{ $game->kategori }}
                </p>
                <p class="text-gray-400 text-sm mt-2">
                    {{ Str::limit($game->deskripsi, 100) }}
                </p>    
                <div class="mt-4">

                    @if($game->status == 'aktif')

                        <span class="bg-green-500/20 text-green-400 px-3 py-1 rounded-full text-xs">
                            Aktif
                        </span>

                    @else

                        <span class="bg-red-500/20 text-red-400 px-3 py-1 rounded-full text-xs">
                            Nonaktif
                        </span>

                    @endif

                </div>

                <a href="#"
                   class="block mt-4 bg-purple-600 hover:bg-purple-700 text-center text-white py-2 rounded-lg">
                    Lihat Layanan
                </a>

                <a href="{{ route('fronted.game.show', $game->id) }}"
                   class="block mt-2 bg-purple-600 hover:bg-purple-700 text-center text-white py-2 rounded-lg">
                    Lihat Detail Game
                </a>

            </div>

        </div>

        @empty

        <div class="col-span-4 text-center py-10">
            <p class="text-gray-400">
                Belum ada game tersedia
            </p>
        </div>

        @endforelse

    </div>

</section>

@endsection