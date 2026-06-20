@extends('layouts.front')
@section('content')
<section class="container mx-auto px-6 py-12">

    <!-- HEADER -->

    <div class="text-center mb-16">

        <h1 class="text-5xl font-bold">
            Tentang Kami
        </h1>

        <p class="text-gray-400 mt-4 max-w-3xl mx-auto">
            Kami adalah penyedia jasa joki game terpercaya yang membantu
            pemain mencapai target mereka dengan cepat, aman, dan profesional.
        </p>

    </div>

    <!-- STORY -->

    <div class="grid lg:grid-cols-2 gap-10 items-center">

        <div>

            <img src="https://i.pinimg.com/736x/63/4d/39/634d39442e98da688bebc9c6da906a3e.jpg" class="rounded-3xl">

        </div>

        <div>

            <h2 class="text-3xl font-bold mb-5">
                Siapa Kami?
            </h2>

            <p class="text-gray-400 leading-8">
                JokiPro hadir untuk membantu para gamer yang memiliki
                keterbatasan waktu namun tetap ingin menikmati progress
                terbaik dalam game favorit mereka.
            </p>

            <p class="text-gray-400 leading-8 mt-5">
                Kami bekerja sama dengan penjoki berpengalaman yang telah
                menangani ribuan pesanan dari berbagai game populer.
            </p>

        </div>

    </div>

    <!-- VISI MISI -->

    <div class="mt-24">

        <h2 class="text-3xl font-bold text-center mb-12">
            Visi & Misi
        </h2>

        <div class="grid md:grid-cols-2 gap-8">

            <div class="bg-[#16122D] p-8 rounded-3xl">

                <h3 class="text-2xl font-bold mb-4">
                    Visi
                </h3>

                <p class="text-gray-400">
                    Menjadi platform jasa joki game terpercaya dan
                    profesional di Indonesia.
                </p>

            </div>

            <div class="bg-[#16122D] p-8 rounded-3xl">

                <h3 class="text-2xl font-bold mb-4">
                    Misi
                </h3>

                <ul class="space-y-3 text-gray-400">

                    <li>✓ Pelayanan cepat dan profesional</li>
                    <li>✓ Menjaga keamanan akun pelanggan</li>
                    <li>✓ Harga kompetitif</li>
                    <li>✓ Support responsif 24 jam</li>

                </ul>

            </div>

        </div>

    </div>

    <!-- KEUNGGULAN -->

    <div class="mt-24">

        <h2 class="text-3xl font-bold text-center mb-12">
            Kenapa Memilih Kami?
        </h2>

        <div class="grid lg:grid-cols-4 gap-6">

            <div class="bg-[#16122D] p-6 rounded-3xl text-center">

                <div class="text-5xl mb-4">
                    ⚡
                </div>

                <h3 class="font-bold text-xl">
                    Cepat
                </h3>

                <p class="text-gray-400 mt-3">
                    Order diproses segera setelah pembayaran.
                </p>

            </div>

            <div class="bg-[#16122D] p-6 rounded-3xl text-center">

                <div class="text-5xl mb-4">
                    🔒
                </div>

                <h3 class="font-bold text-xl">
                    Aman
                </h3>

                <p class="text-gray-400 mt-3">
                    Data akun pelanggan terlindungi.
                </p>

            </div>

            <div class="bg-[#16122D] p-6 rounded-3xl text-center">

                <div class="text-5xl mb-4">
                    🎮
                </div>

                <h3 class="font-bold text-xl">
                    Berpengalaman
                </h3>

                <p class="text-gray-400 mt-3">
                    Tim penjoki profesional dan terpercaya.
                </p>

            </div>

            <div class="bg-[#16122D] p-6 rounded-3xl text-center">

                <div class="text-5xl mb-4">
                    💬
                </div>

                <h3 class="font-bold text-xl">
                    Support
                </h3>

                <p class="text-gray-400 mt-3">
                    Bantuan cepat setiap hari.
                </p>

            </div>

        </div>

    </div>

</section>
@endsection