<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->

    <aside class="w-64 bg-purple-900 text-white p-6">

        <h1 class="text-2xl font-bold mb-10">
            ADMIN PANEL
        </h1>

        <nav class="space-y-4">

            <a href="/admin/dashboard" class="block hover:text-yellow-400">
                Dashboard
            </a>

            <a href="/admin/customer" class="block hover:text-yellow-400">
                Kelola Pelanggan
            </a>

            <a href="/admin/penjoki" class="block hover:text-yellow-400">
                Kelola Penjoki
            </a>

            <a href="/admin/order" class="block hover:text-yellow-400">
                Kelola Order
            </a>

            <a href="/admin/payment" class="block hover:text-yellow-400">
                Kelola Pembayaran
            </a>

        </nav>

    </aside>

    <!-- CONTENT -->

    <main class="flex-1 p-10">

        @yield('content')

    </main>

</div>

</body>
</html>