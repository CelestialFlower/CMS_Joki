@extends('layouts.front')
@section('content')
    <!-- HERO --><section class="container mx-auto px-6 py-12">

    <!-- HEADER -->

    <div class="text-center mb-16">

        <h1 class="text-5xl font-bold">
            Hubungi Kami
        </h1>

        <p class="text-gray-400 mt-4">
            Ada pertanyaan? Tim kami siap membantu.
        </p>

    </div>

    <div class="grid lg:grid-cols-2 gap-10">

        <!-- FORM -->

        <div class="bg-[#16122D] p-8 rounded-3xl">

            <h2 class="text-2xl font-bold mb-8">
                Kirim Pesan
            </h2>

            <form>

                <div class="mb-5">

                    <label class="block mb-2">
                        Nama
                    </label>

                    <input type="text" class="w-full p-4 rounded-xl bg-[#0F0C24] border border-purple-700">

                </div>

                <div class="mb-5">

                    <label class="block mb-2">
                        Email
                    </label>

                    <input type="email" class="w-full p-4 rounded-xl bg-[#0F0C24] border border-purple-700">

                </div>

                <div class="mb-5">

                    <label class="block mb-2">
                        Subjek
                    </label>

                    <input type="text" class="w-full p-4 rounded-xl bg-[#0F0C24] border border-purple-700">

                </div>

                <div class="mb-5">

                    <label class="block mb-2">
                        Pesan
                    </label>

                    <textarea rows="6" class="w-full p-4 rounded-xl bg-[#0F0C24] border border-purple-700"></textarea>

                </div>

                <button type="submit" class="bg-purple-600 px-8 py-3 rounded-xl hover:bg-purple-700">

                    Kirim Pesan

                </button>

            </form>

        </div>

        <!-- INFO -->

        <div>

            <div class="bg-[#16122D] p-8 rounded-3xl mb-6">

                <h3 class="text-2xl font-bold mb-4">
                    Informasi Kontak
                </h3>

                <div class="space-y-4 text-gray-400">

                    <p>
                        📧 Email:
                        admin@jokipro.com
                    </p>

                    <p>
                        📱 WhatsApp:
                        +62 812-3456-7890
                    </p>

                    <p>
                        📍 Lokasi:
                        Indonesia
                    </p>

                </div>

            </div>

            <div class="bg-[#16122D] p-8 rounded-3xl">

                <h3 class="text-2xl font-bold mb-4">
                    Jam Operasional
                </h3>

                <div class="space-y-3 text-gray-400">

                    <p>Senin - Jumat : 08.00 - 22.00</p>
                    <p>Sabtu : 08.00 - 23.00</p>
                    <p>Minggu : 09.00 - 22.00</p>

                </div>

            </div>

        </div>

    </div>

</section>
@endsection