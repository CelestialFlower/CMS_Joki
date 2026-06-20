@php
use Illuminate\Support\Str;
@endphp
@extends('layouts.front')

@section('content')
    <!-- HERO --><section class="container mx-auto px-6 py-10">


    <!-- FEATURED ARTICLE -->
    @php
$featured = $artikels->first();
@endphp

@if($featured)

<div class="bg-[#16122D] rounded-3xl overflow-hidden mb-16">

    <div class="grid lg:grid-cols-2">

        <img
            src="{{ asset('storage/'.$featured->thumbnail) }}"
            class="w-full h-full object-cover">

        <div class="p-10">

            <span class="bg-purple-600 px-4 py-2 rounded-full text-sm">

                Featured

            </span>

            <h2 class="text-4xl font-bold mt-6">

                {{ $featured->judul }}

            </h2>

            <p class="text-gray-400 mt-5">

                {{ $featured->isi }}

            </p>

            
            
        </div>

    </div>

</div>

@endif

    <!-- ARTICLE GRID -->

    <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-8">

    @forelse($artikels as $artikel)

    <div class="bg-[#16122D] rounded-3xl overflow-hidden hover:scale-105 duration-300">

        <!-- THUMBNAIL -->
        @if($artikel->thumbnail)

            <img
                src="{{ asset('storage/'.$artikel->thumbnail) }}"
                class="w-full h-56 object-cover">

        @else

            <img
                src="https://placehold.co/600x350?text=No+Image"
                class="w-full h-56 object-cover">

        @endif

        <div class="p-6">

            <!-- NAMA GAME -->
            <span class="text-purple-400 text-sm">

                {{ $artikel->game->nama_game }}

            </span>

            <!-- JUDUL -->
            <h3 class="text-xl font-bold mt-3">

                {{ $artikel->judul }}

            </h3>

            <!-- ISI -->
            <p class="text-gray-400 mt-3">

                {{ Str::limit(strip_tags($artikel->isi), 150) }}

            </p>

            <a
    href="{{ route('fronted.artikel.show', $artikel->id) }}"
    class="inline-block mt-5 bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg">
    Baca Selengkapnya
</a>
        </div>

    </div>

    @empty

    <div class="col-span-3 text-center py-20 text-gray-400">

        Belum ada artikel.

    </div>

    @endforelse

</div>

</section>
@endsection