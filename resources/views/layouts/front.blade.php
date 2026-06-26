<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Joki Game</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: #09071F;
        }

        .card-bg {
            background: linear-gradient(135deg,
                    #312E81,
                    #1E1B4B);
        }

        .glow {
            box-shadow:
                0 0 20px rgba(124, 58, 237, .3);
        }
    </style>

</head>

<body class="text-white">

    <!-- NAVBAR -->
    <nav class="bg-[#0f0c29] border-b border-purple-800">

        <div class="container mx-auto px-6">

            <div class="flex justify-between items-center h-20">

                <div class="flex items-center gap-3">

                   <img src="https://i.pinimg.com/736x/06/fa/90/06fa907ff45ab825d353056ce6b7e95b.jpg" class="w-12 h-12 rounded-full">

                    <img src="{{ asset('image/text.gif') }}"
                            alt="CSstore"
                            class="h-10 w-auto">

                </div>

                <div class="hidden md:flex gap-8">

                    <a href="{{ route('fronted.home') }}">Beranda</a>
                    <a href="{{ route('fronted.game') }}">Game</a>
                    <a href="{{ route('fronted.artikel') }}">Artikel</a>
                    <a href="{{ route('fronted.tentang') }}">Tentang</a>
                    <a href="{{ route('fronted.kontak') }}">Kontak</a>

                </div>

               <div class="flex gap-3">

    @guest
<button class="px-4 py-2 border border-purple-500 rounded-lg">
    <a href="{{ route('login') }}">
        Login
    </a>
<button class="px-4 py-2 bg-purple-600 rounded-lg">
    <a href="{{ route('register') }}">
        Daftar
    </a>
</button>
@endguest

@auth
@if(Auth::user()->role == 'admin')
<button class="px-4 py-2 bg-purple-600 rounded-lg">
    <a href="{{ route('admin.dashboard') }}">
        Dashboard Admin
    </a>
</button>
@else
<button class="px-4 py-2 bg-purple-600 rounded-lg">
    <a href="{{ route('user.dashboard') }}">
        Dashboard
    </a>
</button>

@endif
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="px-4 py-2 bg-red-600 rounded-lg">
        Logout
    </button>
</form>

@endauth

</div>

            </div>

        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
     <footer class="bg-[#050314]">

        <div class="container mx-auto px-6 py-12">

            <div class="grid lg:grid-cols-4 gap-10">

                <div>

                    <h3 class="font-bold text-xl">

                        JOKI CSstore

                    </h3>

                    <p class="mt-4 text-gray-400">

                        Jasa joki game terpercaya.

                    </p>

                </div>

                <div>

                    <h4 class="font-bold">

                        Menu

                    </h4>

                    <ul class="space-y-3 mt-4">

                        <li><a href="{{ route('fronted.home') }}">Beranda</a></li>
                        <li><a href="{{ route('fronted.game') }}">Game</a></li>
                        <li><a href="{{ route('fronted.artikel') }}">Artikel</a></li>

                    </ul>

                </div>

                <div>

                    <h4 class="font-bold">

                        Bantuan

                    </h4>

                    <ul class="space-y-3 mt-4">

                        <li>FAQ</li>
                        <li><a href="{{ route('fronted.kontak') }}">Kontak</a></li>

                    </ul>

                </div>

                <div>

                    <h4 class="font-bold">

                        Sosial Media

                    </h4>

                    <ul class="space-y-3 mt-4">

                        <li>Instagram</li>
                        <li>Tiktok</li>
                        <li>Discord</li>

                    </ul>

                </div>

            </div>

            <hr class="my-10 border-purple-900">

            <p class="text-center text-gray-400">

                © 2026 Joki CSstore.

            </p>

        </div>

    </footer>

</body>

</html>