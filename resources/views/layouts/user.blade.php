<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0b0b1f] text-white">

<!-- main NAVBAR -->
 <nav class="bg-[#0f0c29] border-b border-purple-800">

        <div class="container mx-auto px-6">

            <div class="flex justify-between items-center h-20">

                <div class="flex items-center gap-3">

                    <div class="w-12 h-12 bg-purple-600 rounded-full"></div>

                    <h1 class="font-bold text-xl">
                        JOKI CSstore
                    </h1>

                </div>

                <div class="hidden md:flex gap-8">

                    <a href="{{ route('fronted.home') }}">Beranda</a>
                    <a href="{{ route('fronted.game') }}">Game</a>
                    <a href="{{ route('fronted.artikel') }}">Artikel</a>
                    <a href="{{ route('fronted.tentang') }}">Tentang</a>
                    <a href="{{ route('fronted.kontak') }}">Kontak</a>

                </div>

               <div class="flex items-center gap-4">

    @guest

        <a href="{{ route('login') }}"
           class="px-4 py-2 border border-purple-500 rounded-lg">
            Login
        </a>

        <a href="{{ route('register') }}"
           class="px-4 py-2 bg-purple-600 rounded-lg">
            Daftar
        </a>

    @endguest

    @auth

    

        @if(Auth::user()->role == 'admin')

            <a href="{{ route('admin.dashboard') }}"
               class="px-4 py-2 bg-green-600 rounded-lg">
                Dashboard Admin
            </a>

        @else

            <a href="{{ route('user.dashboard') }}"
               class="px-4 py-2 bg-blue-600 rounded-lg">
                Dashboard
            </a>

        @endif

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                    class="px-4 py-2 bg-red-600 rounded-lg">
                Logout
            </button>
        </form>

    @endauth

</div>

            </div>

        </div>
    </nav>

    <!-- NAVBAR -->



    <div class="flex">

        <!-- SIDEBAR -->

        <aside class="w-64 min-h-screen bg-[#17132f] text-white p-6 border-r border-purple-800">    

    <div class="mb-8">

        <h2 class="text-xl font-bold">
            USER PANEL
        </h2>

        @auth

            <div class="mt-3 p-3 bg-indigo-800 rounded-lg">

                <div class="font-semibold">
                    {{ Auth::user()->email }}
                </div>
                <div class="font-semibold">
                    {{ Auth::user()->role }}
                </div>
                <div class="font-semibold">

            @if(Auth::user()->status == 'aktif')

                <span class="bg-green-500/20 text-green-400 px-3 py-1 rounded-full">
                    Aktif
                </span>

            @else

                <span class="bg-red-500/20 text-red-400 px-3 py-1 rounded-full">
                    Suspend
                </span>

            @endif

</div>
        @endauth

    </div>

    <nav class="space-y-3">

        <a href="{{ route('user.dashboard') }}"
           class="block p-3 rounded-lg hover:bg-indigo-700">
            🏠 Dashboard
        </a>

        <a href="{{ route('user.order') }}"
           class="block p-3 rounded-lg hover:bg-indigo-700">
            🎮 Buat Order
        </a>

        <a href="{{ route('user.status-order') }}"
           class="block p-3 rounded-lg hover:bg-indigo-700">
            📦 Status Order
        </a>
        <a href="{{ route('user.riwayat') }}"
            class="block p-3 rounded-lg hover:bg-indigo-700">
    📜 Riwayat Order
        </a>
    </nav>

</aside>

        <!-- CONTENT -->

        <main class="flex-1 p-8 bg-[#0b0b1f] min-h-screen">


            @yield('content')

        </main>

    </div>

</body>
</html>