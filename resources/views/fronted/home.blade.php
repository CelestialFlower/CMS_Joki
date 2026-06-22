@extends('layouts.front')
@section('content')
    <!-- HERO -->
    <section class="container mx-auto px-6 py-10">

        <div class="rounded-3xl overflow-hidden bg-gradient-to-r from-purple-900 via-purple-700 to-indigo-700">

            <div class="grid lg:grid-cols-2">

                <div class="p-12">

                    <h1 class="text-5xl font-black leading-tight">

                        JOKI GAME
                        TERPERCAYA
                        INDONESIA

                    </h1>

                    <p class="mt-6 text-lg text-gray-200">

                        Push Rank, Farming,
                        Quest, Achievement,
                        hingga Endgame Service.

                    </p>

                    <div class="mt-8 flex gap-4">
                        @auth
                        <button class="bg-yellow-500 px-6 py-3 rounded-xl font-bold text-black">

                            <a href="{{ route('user.order') }}">
                                Order Sekarang
                            </a>

                        </button>
                        @else
                        <button type="button" onclick="openLoginPopup()" class="bg-yellow-500 px-6 py-3 rounded-xl font-bold text-black">

                            
                                Order Sekarang
                            

                        </button>
                        @endauth
                        <button class="border px-6 py-3 rounded-xl" >

                            <a href="{{ route('fronted.game') }}" class="text-white font-bold">

                                Lihat game
                            </a>
                        </button>

                    </div>

                </div>

                <div class="flex items-center justify-center">

                    <img src="https://i.pinimg.com/736x/25/5d/b9/255db91af71de5648c87577c6dc1d182.jpg" class="h-full object-cover">

                </div>

            </div>

        </div>

    </section>

    <!-- FLASH SALE -->

    <section class="container mx-auto px-6">

        <h2 class="text-2xl font-bold mb-6">

            🔥 Flash Sale

        </h2>

        <div class="grid md:grid-cols-4 gap-5">

            <div class="card-bg p-5 rounded-2xl glow">

                <h3 class="font-bold">
                    Joki Mythic
                </h3>

                <p class="text-purple-300">
                    Mobile Legends
                </p>

                <div class="mt-4 text-2xl font-bold text-yellow-400">

                    Rp 49.000

                </div>

                <button class="mt-5 bg-purple-600 w-full py-2 rounded-xl">

                    Order

                </button>

            </div>

            <div class="card-bg p-5 rounded-2xl glow">
                ...
            </div>

            <div class="card-bg p-5 rounded-2xl glow">
                ...
            </div>

            <div class="card-bg p-5 rounded-2xl glow">
                ...
            </div>

        </div>

    </section>

    <!-- GAME SECTION -->
<section class="container mx-auto px-6 py-16">

    <div class="flex items-center justify-between mb-8">
        <h2 class="text-3xl font-bold">🎮 Game Populer</h2>
        <a href="{{ route('fronted.game') }}" class="text-purple-400 hover:text-purple-300 text-sm">
            Lihat Semua &rarr;
        </a>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-5">

        @forelse($games as $game)

            <div class="bg-[#2b2650] rounded-2xl overflow-hidden shadow-lg hover:scale-105 transition duration-300">

                <img
                    src="{{ $game->thumbnail ? asset('storage/'.$game->thumbnail) : 'https://placehold.co/400x220?text=No+Image' }}"
                    class="w-full h-40 object-cover">

                <div class="p-4">
                    <h3 class="text-white font-bold text-base truncate">
                        {{ $game->nama_game }}
                    </h3>

                    <p class="text-gray-400 text-xs mt-1">
                        {{ $game->kategori }}
                    </p>

                    <div class="mt-3">
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

                    <a href="{{ route('fronted.game', $game->id) }}"
                       class="block mt-4 bg-purple-600 hover:bg-purple-700 text-center text-white py-2 rounded-lg text-sm">
                        Lihat Layanan
                    </a>
                </div>

            </div>

        @empty

            <div class="col-span-full text-center py-10">
                <p class="text-gray-400">Belum ada game tersedia</p>
            </div>

        @endforelse

    </div>

</section>
    <!-- KEUNGGULAN -->

    <section class="container mx-auto px-6 py-16">

        <h2 class="text-3xl font-bold mb-10">

            Kenapa Memilih Kami?

        </h2>

        <div class="grid lg:grid-cols-4 gap-6">

            <div class="card-bg p-6 rounded-2xl">

                <div class="text-5xl mb-4">
                    ⚡
                </div>

                <h3 class="font-bold text-xl">

                    Pengerjaan Cepat

                </h3>

                <p class="text-gray-300 mt-3">

                    Order langsung diproses.

                </p>

            </div>

            <div class="card-bg p-6 rounded-2xl">

                <div class="text-5xl mb-4">
                    🛡️
                </div>

                <h3 class="font-bold text-xl">

                    Aman

                </h3>

                <p class="text-gray-300 mt-3">

                    Data akun terjamin.

                </p>

            </div>

            <div class="card-bg p-6 rounded-2xl">

                <div class="text-5xl mb-4">
                    👨‍💻
                </div>

                <h3 class="font-bold text-xl">

                    Penjoki Berpengalaman

                </h3>

                <p class="text-gray-300 mt-3">

                    Sudah ribuan order.

                </p>

            </div>

            <div class="card-bg p-6 rounded-2xl">

                <div class="text-5xl mb-4">
                    📞
                </div>

                <h3 class="font-bold text-xl">

                    Support 24 Jam

                </h3>

                <p class="text-gray-300 mt-3">

                    Siap membantu.

                </p>

            </div>

        </div>

    </section>

    <!-- CARA ORDER -->

    <section class="container mx-auto px-6 py-16">

        <h2 class="text-3xl font-bold mb-10">

            Cara Order

        </h2>

        <div class="grid lg:grid-cols-4 gap-6">

            <div class="card-bg rounded-2xl p-6">

                <div class="text-5xl font-black text-purple-400">

                    01

                </div>

                <p class="mt-4">

                    Pilih Game

                </p>

            </div>

            <div class="card-bg rounded-2xl p-6">

                <div class="text-5xl font-black text-purple-400">

                    02

                </div>

                <p class="mt-4">

                    Pilih Paket

                </p>

            </div>

            <div class="card-bg rounded-2xl p-6">

                <div class="text-5xl font-black text-purple-400">

                    03

                </div>

                <p class="mt-4">

                    Bayar

                </p>

            </div>

            <div class="card-bg rounded-2xl p-6">

                <div class="text-5xl font-black text-purple-400">

                    04

                </div>

                <p class="mt-4">

                    Order Diproses

                </p>

            </div>

        </div>

    </section>

    <!-- ARTIKEL -->

    <section class="container mx-auto px-6 pb-16">

    <div class="flex items-center justify-between mb-8">
        <h2 class="text-3xl font-bold">📰 Artikel Terbaru</h2>
        <a href="{{ route('fronted.artikel') }}" class="text-purple-400 hover:text-purple-300 text-sm">
            Lihat Semua &rarr;
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        @forelse($articles as $article)

            <a href="{{ route('fronted.artikel', $article->slug ?? $article->id) }}"
               class="bg-[#2b2650] rounded-2xl overflow-hidden shadow-lg hover:scale-105 transition duration-300">

                <img
                    src="{{ $article->thumbnail ? asset('storage/'.$article->thumbnail) : 'https://placehold.co/400x220?text=No+Image' }}"
                    class="w-full h-40 object-cover">

                <div class="p-4">
                    <h3 class="text-white font-semibold text-base line-clamp-2">
                        {{ $article->judul }}
                    </h3>

                    <p class="text-gray-400 text-xs mt-2">
                        {{ $article->created_at->translatedFormat('d M Y') }}
                    </p>
                </div>

            </a>

        @empty

            <div class="col-span-full text-center py-10">
                <p class="text-gray-400">Belum ada artikel tersedia</p>
            </div>

        @endforelse

    </div>

</section>

    <!-- CTA -->

    <section class="container mx-auto px-6 pb-20">

        <div class="bg-gradient-to-r
from-purple-700
to-indigo-700
rounded-3xl
p-12
text-center">

            <h2 class="text-4xl font-black">

                

            </h2>

            <p class="mt-5 text-lg">

                Order sekarang dan biarkan
                kami menyelesaikan pekerjaanmu.

            </p>

                <br>

                @auth
                        <button class="mt-8
                                bg-yellow-400
                                text-black
                                font-bold
                                px-8
                                py-4
                                rounded-xl">

                            <a href="{{ route('user.order') }}">
                                Order Sekarang
                            </a>

                        </button>
                        @else
                        <button type="button" onclick="openLoginPopup()" class="bg-yellow-500 px-6 py-3 rounded-xl font-bold text-black">

                            
                                Order Sekarang
                            

                        </button>
                 @endauth

          

        </div>

    </section>
    {{-- POPUP LOGIN --}}
<div id="loginPopup"
     class="fixed inset-0 bg-black/70 hidden items-center justify-center z-50 px-4">

    <div class="bg-[#1f1b3a] border border-purple-700 rounded-2xl p-6 max-w-md w-full shadow-2xl">

        <div class="flex justify-between items-center mb-5">
            <h2 class="text-xl font-bold text-white">
                Login Diperlukan
            </h2>

            <button
                type="button"
                onclick="closeLoginPopup()"
                class="text-gray-400 hover:text-white text-3xl leading-none">
                &times;
            </button>
        </div>

        <div class="text-center">

            <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-purple-500/20 flex items-center justify-center text-3xl">
                🔒
            </div>

            <p class="text-gray-300 leading-relaxed">
                Silakan <span class="text-purple-400 font-semibold">login</span>
                atau <span class="text-purple-400 font-semibold">daftar</span>
                terlebih dahulu untuk melakukan pesanan joki.
            </p>

            <div class="grid grid-cols-2 gap-3 mt-6">

                <a href="{{ route('login') }}"
                   class="bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-xl font-semibold">
                    Login
                </a>

                <a href="{{ route('register') }}"
                   class="bg-[#2b2650] hover:bg-[#393263] text-white py-3 rounded-xl font-semibold border border-purple-700">
                    Daftar
                </a>

            </div>

        </div>

    </div>

</div>

<script>
function openLoginPopup()
{
    const popup = document.getElementById('loginPopup');

    popup.classList.remove('hidden');
    popup.classList.add('flex');
}

function closeLoginPopup()
{
    const popup = document.getElementById('loginPopup');

    popup.classList.add('hidden');
    popup.classList.remove('flex');
}

document.getElementById('loginPopup').addEventListener('click', function(event) {
    if (event.target === this) {
        closeLoginPopup();
    }
});
</script>
@endsection