<x-guest-layout>

<div class="min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-xl bg-[#1f1b3a] border border-purple-800 rounded-3xl shadow-2xl p-10">

        <!-- Header -->
        <div class="text-center mb-10">

            <h1 class="text-4xl font-bold text-white">
                🎮 Daftar Akun
            </h1>

            <p class="text-gray-400 mt-3">
                Buat akun untuk mulai melakukan pemesanan joki.
            </p>

        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nama -->
            <div>

                <x-input-label
                    for="name"
                    class="text-white"
                    :value="__('Nama')" />

                <x-text-input
                    id="name"
                    class="block mt-3 w-full h-14 px-5 bg-[#2b2650] border-purple-700 text-white text-base rounded-2xl focus:border-purple-500"
                    type="text"
                    name="name"
                    :value="old('name')"
                    required
                    autofocus
                    autocomplete="name" />

                <x-input-error
                    :messages="$errors->get('name')"
                    class="mt-2 text-red-400" />

            </div>

            <!-- Email -->
            <div class="mt-6">

                <x-input-label
                    for="email"
                    class="text-white"
                    :value="__('Email')" />

                <x-text-input
                    id="email"
                    class="block mt-3 w-full h-14 px-5 bg-[#2b2650] border-purple-700 text-white text-base rounded-2xl focus:border-purple-500"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autocomplete="username" />

                <x-input-error
                    :messages="$errors->get('email')"
                    class="mt-2 text-red-400" />

            </div>

            <!-- Password -->
            <div class="mt-6">

                <x-input-label
                    for="password"
                    class="text-white"
                    :value="__('Password')" />

                <x-text-input
                    id="password"
                    class="block mt-3 w-full h-14 px-5 bg-[#2b2650] border-purple-700 text-white text-base rounded-2xl focus:border-purple-500"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password" />

                <x-input-error
                    :messages="$errors->get('password')"
                    class="mt-2 text-red-400" />

            </div>

            <!-- Konfirmasi Password -->
            <div class="mt-6">

                <x-input-label
                    for="password_confirmation"
                    class="text-white"
                    :value="__('Konfirmasi Password')" />

                <x-text-input
                    id="password_confirmation"
                    class="block mt-3 w-full h-14 px-5 bg-[#2b2650] border-purple-700 text-white text-base rounded-2xl focus:border-purple-500"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password" />

                <x-input-error
                    :messages="$errors->get('password_confirmation')"
                    class="mt-2 text-red-400" />

            </div>

            <!-- Footer -->
            <div class="flex items-center justify-between mt-10">

                <a
                    href="{{ route('login') }}"
                    class="text-sm text-purple-400 hover:text-purple-300">

                    Sudah punya akun?

                </a>

                <x-primary-button
                    class="bg-purple-600 hover:bg-purple-700 px-8 py-4 rounded-2xl text-base">

                    {{ __('Daftar') }}

                </x-primary-button>

            </div>

        </form>

    </div>

</div>

</x-guest-layout>