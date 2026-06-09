@extends('layouts.front')
@section('content')
    <!-- HERO --><section class="container mx-auto px-6 py-10">

    <!-- HEADER -->

    <div class="text-center mb-12">

        <h1 class="text-5xl font-bold">
            Artikel Gaming
        </h1>

        <p class="text-gray-400 mt-4">
            Tips, Guide, Build Character, Meta dan Update Game Terbaru
        </p>

    </div>

    <!-- SEARCH -->

    <div class="max-w-xl mx-auto mb-12">

        <input type="text" placeholder="Cari artikel..."
            class="w-full bg-[#16122D] border border-purple-700 rounded-xl p-4">

    </div>

    <!-- FEATURED ARTICLE -->

    <div class="bg-[#16122D]
        rounded-3xl
        overflow-hidden
        mb-16">

        <div class="grid lg:grid-cols-2">

            <img src="https://placehold.co/800x500" class="w-full h-full object-cover">

            <div class="p-10">

                <span class="bg-purple-600 px-4 py-2 rounded-full text-sm">

                    Featured

                </span>

                <h2 class="text-4xl font-bold mt-6">

                    Tips Push Rank Mythic Cepat di Mobile Legends

                </h2>

                <p class="text-gray-400 mt-5">

                    Pelajari strategi rotasi, draft pick,
                    dan hero meta terbaru untuk mempercepat
                    perjalanan menuju Mythic Glory.

                </p>

                <button class="mt-8 bg-purple-600 px-6 py-3 rounded-xl">

                    Baca Selengkapnya

                </button>

            </div>

        </div>

    </div>

    <!-- ARTICLE GRID -->

    <div class="grid lg:grid-cols-3 gap-8">

        <!-- CARD 1 -->

        <div class="bg-[#16122D]
            rounded-3xl
            overflow-hidden
            hover:scale-105
            duration-300">

            <img src="https://placehold.co/600x350" class="w-full">

            <div class="p-6">

                <span class="text-purple-400 text-sm">

                    Zenless Zone Zero

                </span>

                <h3 class="text-xl font-bold mt-3">

                    Build Ellen Joe Terbaik 2026

                </h3>

                <p class="text-gray-400 mt-3">

                    Panduan lengkap build,
                    W-Engine dan Team Composition.

                </p>

                <a href="#" class="inline-block mt-5 text-purple-400">

                    Baca Artikel →

                </a>

            </div>

        </div>

        <!-- CARD 2 -->

        <div class="bg-[#16122D]
            rounded-3xl
            overflow-hidden">

            <img src="https://placehold.co/600x350">

            <div class="p-6">

                <span class="text-purple-400 text-sm">

                    Wuthering Waves

                </span>

                <h3 class="text-xl font-bold mt-3">

                    Guide Rover untuk Pemula

                </h3>

                <p class="text-gray-400 mt-3">

                    Cara cepat meningkatkan Union Level
                    dan resource farming.

                </p>

                <a href="#" class="inline-block mt-5 text-purple-400">

                    Baca Artikel →

                </a>

            </div>

        </div>

        <!-- CARD 3 -->

        <div class="bg-[#16122D]
            rounded-3xl
            overflow-hidden">

            <img src="https://placehold.co/600x350">

            <div class="p-6">

                <span class="text-purple-400 text-sm">

                    Honkai Star Rail

                </span>

                <h3 class="text-xl font-bold mt-3">

                    Tier List Karakter Terbaru

                </h3>

                <p class="text-gray-400 mt-3">

                    Karakter terbaik untuk Memory of Chaos
                    dan endgame content.

                </p>

                <a href="#" class="inline-block mt-5 text-purple-400">

                    Baca Artikel →

                </a>

            </div>

        </div>

        <!-- CARD 4 -->

        <div class="bg-[#16122D]
            rounded-3xl
            overflow-hidden">

            <img src="https://placehold.co/600x350">

            <div class="p-6">

                <span class="text-purple-400 text-sm">

                    Blue Archive

                </span>

                <h3 class="text-xl font-bold mt-3">

                    Student Terbaik untuk Raid

                </h3>

                <p class="text-gray-400 mt-3">

                    Daftar karakter wajib untuk
                    Total Assault.

                </p>

                <a href="#" class="inline-block mt-5 text-purple-400">

                    Baca Artikel →

                </a>

            </div>

        </div>

        <!-- CARD 5 -->

        <div class="bg-[#16122D]
            rounded-3xl
            overflow-hidden">

            <img src="https://placehold.co/600x350">

            <div class="p-6">

                <span class="text-purple-400 text-sm">

                    Nikke

                </span>

                <h3 class="text-xl font-bold mt-3">

                    Team Campaign Terkuat

                </h3>

                <p class="text-gray-400 mt-3">

                    Rekomendasi squad terbaik
                    untuk progress story.

                </p>

                <a href="#" class="inline-block mt-5 text-purple-400">

                    Baca Artikel →

                </a>

            </div>

        </div>

        <!-- CARD 6 -->

        <div class="bg-[#16122D]
            rounded-3xl
            overflow-hidden">

            <img src="https://placehold.co/600x350">

            <div class="p-6">

                <span class="text-purple-400 text-sm">

                    Genshin Impact

                </span>

                <h3 class="text-xl font-bold mt-3">

                    Build Mavuika Terbaik

                </h3>

                <p class="text-gray-400 mt-3">

                    Weapon, artifact dan team
                    terbaik untuk Mavuika.

                </p>

                <a href="#" class="inline-block mt-5 text-purple-400">

                    Baca Artikel →

                </a>

            </div>

        </div>

    </div>

    <!-- PAGINATION -->

    <div class="flex justify-center gap-3 mt-16">

        <button class="bg-[#16122D] w-12 h-12 rounded-xl">
            1
        </button>

        <button class="bg-[#16122D] w-12 h-12 rounded-xl">
            2
        </button>

        <button class="bg-[#16122D] w-12 h-12 rounded-xl">
            3
        </button>

    </div>

</section>
@endsection