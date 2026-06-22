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
                    {{ Str::limit($game->deskripsi, 50) }}
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
                @auth
                <a href="{{ route('user.order', ['game_id' => $game->id]) }}"
                   class="block mt-4 bg-purple-600 hover:bg-purple-700 text-center text-white py-2 rounded-lg">
                    Pesan Joki Sekarang
                </a>
                @else
                    <a type="button" onclick="openLoginPopup()"
                   class="block mt-4 bg-purple-600 hover:bg-purple-700 text-center text-white py-2 rounded-lg">
                    Pesan Joki Sekarang
                    </a>
                @endauth

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