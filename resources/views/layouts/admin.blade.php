<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0b0b1f] text-white">

<!-- main NAVBAR -->
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

    <!-- Side bar -->
<div class="flex h-screen overflow-hidden">

    {{-- Sidebar --}}
    <aside class="w-64 bg-[#15122d] flex-shrink-0">
        <aside class="w-64 min-h-screen bg-[#17132f] text-white p-6 border-r border-purple-800">

    <div class="mb-8">

        <h2 class="text-xl font-bold">
           Admin Panel
        </h2>

        @auth

            <div class="mt-3 p-3 bg-indigo-800 rounded-lg">

                <div class="font-semibold">
                    {{ Auth::user()->name }}
                </div>
                <div class="font-semibold">
                    {{ Auth::user()->role }}
                </div>
            </div>

        @endauth

    </div>

    <nav class="space-y-3">

        <a href="{{ route('admin.dashboard') }}"
           class="block p-3 rounded-lg hover:bg-indigo-700">
            🏠 Dashboard
        </a>

        <a href="{{ route('admin.costumer') }}"
           class="block p-3 rounded-lg hover:bg-indigo-700">
            🧑‍💼 Kelola Pelanggan
        </a>
        <a href="{{ route('admin.kelolaorder') }}"
           class="block p-3 rounded-lg hover:bg-indigo-700">
            📦 Kelola Order
        </a>

        <a href="{{ route('admin.kelolaartikel') }}"
           class="block p-3 rounded-lg hover:bg-indigo-700">
            📝 Kelola Artikel  
        </a>
        <a href="{{ route('admin.kelolagame') }}"
           class="block p-3 rounded-lg hover:bg-indigo-700">
            🎮 Kelola Game
        </a>
        
    </nav>

</aside>
    </aside>

    {{-- Content --}}
    <main class="flex-1 overflow-y-auto bg-[#0b0b1f] p-8">
        @yield('content')
    </main>

</div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

 @stack('scripts')
</body>
</html>