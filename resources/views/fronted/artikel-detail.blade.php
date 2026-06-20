@extends('layouts.front')

@section('content')

<section class="container mx-auto px-6 py-10">

    <div class="max-w-4xl mx-auto">

        <img
            src="{{ asset('storage/'.$artikel->thumbnail) }}"
            class="w-full h-[400px] object-cover rounded-2xl">

        <div class="mt-8">

            <span class="text-purple-400">
                {{ $artikel->game->nama_game }}
            </span>

            <h1 class="text-4xl font-bold text-white mt-3">
                {{ $artikel->judul }}
            </h1>

            <p class="text-gray-500 mt-2">
                {{ $artikel->created_at->format('d M Y') }}
            </p>

            <div class="mt-8 text-gray-300 leading-8">
                {!! nl2br(e($artikel->isi)) !!}
            </div>

        </div>

    </div>

</section>

@endsection