<x-guest-layout>

<div class="min-h-screen flex items-center justify-center bg-[#141026] px-4">

    <div class="w-full max-w-md bg-[#1f1b3a] rounded-3xl shadow-2xl border border-purple-800 p-8">

        <!-- Logo -->
        <div class="text-center mb-8">

            <h1 class="text-4xl font-bold text-white">
                🎮 CSStore
            </h1>

            <p class="text-gray-400 mt-2">
                Login untuk melanjutkan pemesanan joki
            </p>

        </div>

        <!-- Session Status -->
        <x-auth-session-status
            class="mb-4 text-green-400"
            :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">

            @csrf

            <!-- Email -->
            <div class="mb-5">

                <label class="block text-gray-300 mb-2">
                    Email
                </label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="w-full bg-[#2b2650] border border-purple-700 rounded-xl p-4 text-white focus:border-purple-500 focus:ring-0">

                <x-input-error
                    :messages="$errors->get('email')"
                    class="mt-2 text-red-400"/>

            </div>

            <!-- Password -->
            <div>

                <label class="block text-gray-300 mb-2">
                    Password
                </label>

                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    class="w-full bg-[#2b2650] border border-purple-700 rounded-xl p-4 text-white focus:border-purple-500 focus:ring-0">

                <x-input-error
                    :messages="$errors->get('password')"
                    class="mt-2 text-red-400"/>

            </div>

            <!-- Remember -->
            <div class="flex justify-between items-center mt-5">

                <label class="flex items-center gap-2 text-gray-400">

                    <input
                        type="checkbox"
                        name="remember"
                        class="rounded border-purple-600 bg-[#2b2650]">

                    Remember me

                </label>

                @if (Route::has('password.request'))

                    <a
                        href="{{ route('password.request') }}"
                        class="text-purple-400 hover:text-purple-300 text-sm">

                        Lupa Password?

                    </a>

                @endif

            </div>

            <!-- Tombol Login -->
            <button
                type="submit"
                class="w-full mt-8 bg-purple-600 hover:bg-purple-700 duration-300 text-white font-semibold py-4 rounded-xl">

                Login

            </button>

        </form>

        <!-- Register -->
        <div class="text-center mt-6">

            <p class="text-gray-400">

                Belum punya akun?

                <a
                    href="{{ route('register') }}"
                    class="text-purple-400 hover:text-purple-300">

                    Daftar disini

                </a>

            </p>

        </div>

    </div>

</div>

</x-guest-layout>