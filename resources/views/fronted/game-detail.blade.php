@extends('layouts.front')

@section('content')

<section class="container mx-auto px-6 py-10">

    <div class="max-w-6xl mx-auto">

        <!-- Banner Game -->
        <img
            src="{{ asset('storage/'.$game->thumbnail) }}"
            class="w-full h-[400px] object-cover rounded-2xl">

        <!-- Informasi -->
        <div class="mt-8">

            <span class="text-purple-400">
                {{ $game->kategori }}
            </span>

            <h1 class="text-4xl font-bold text-white mt-2">
                {{ $game->nama_game }}
            </h1>

            <div class="mt-4">
                @if($game->status == 'aktif')

                    <span class="bg-green-500/20 text-green-400 px-3 py-1 rounded-full">
                        Aktif
                    </span>

                @else

                    <span class="bg-red-500/20 text-red-400 px-3 py-1 rounded-full">
                        Nonaktif
                    </span>

                @endif
            </div>

            <div class="mt-6 text-gray-300 leading-8">
                {!! nl2br(e($game->deskripsi)) !!}
            </div>

        </div>

        <!-- Artikel Terkait -->
        <div class="mt-16">

            <h2 class="text-2xl font-bold text-white mb-6">
                Artikel Terkait
            </h2>

            <div class="grid md:grid-cols-3 gap-6">

                @forelse($artikels as $artikel)

                    <div class="bg-[#2b2650] rounded-2xl overflow-hidden">

                        <img
                            src="{{ asset('storage/'.$artikel->thumbnail) }}"
                            class="w-full h-40 object-cover">

                        <div class="p-4">

                            <h3 class="text-white font-semibold">
                                {{ $artikel->judul }}
                            </h3>

                            <a
                                href="{{ route('fronted.artikel.show',$artikel->id) }}"
                                class="inline-block mt-3 text-purple-400">

                                Baca Artikel →

                            </a>

                        </div>

                    </div>

                @empty

                    <p class="text-gray-400">
                        Belum ada artikel untuk game ini.
                    </p>

                @endforelse

            </div>

        </div>

    </div>

</section>

@endsection