<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- NAVBAR -->

    <header class="bg-white shadow">

        <div class="max-w-full px-8 py-4 flex justify-between items-center">

            <h1 class="text-2xl font-bold">
                CMS JOKI
            </h1>

            <div class="flex items-center gap-4">

                <span>
                    {{ Auth::user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="bg-red-500 text-white px-4 py-2 rounded-lg">

                        Logout

                    </button>
                </form>

            </div>

        </div>

    </header>

    <div class="flex">

        <!-- SIDEBAR -->

        <aside class="w-64 min-h-screen bg-indigo-900 text-white p-6">

            <h2 class="text-xl font-bold mb-8">
                USER PANEL
            </h2>

            <nav class="space-y-4">

                <a href="{{ route('user/dashboard') }}"
                   class="block hover:text-yellow-400">

                    Dashboard

                </a>

                <a href="/user/order"
                   class="block hover:text-yellow-400">

                    Buat Order

                </a>

                <a href="/user/riwayat"
                   class="block hover:text-yellow-400">

                    Riwayat Order

                </a>

                <a href="/user/status-order"
                   class="block hover:text-yellow-400">

                    Status Order

                </a>

            </nav>

        </aside>

        <!-- CONTENT -->

        <main class="flex-1 p-8">

            @yield('content')

        </main>

    </div>

</body>
</html>