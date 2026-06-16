@extends('layouts.user')

@section('content')

<div class="bg-[#16122D] p-8 rounded-3xl">

    <h2 class="text-3xl font-bold mb-8">
        Buat Order Joki
    </h2>

    <form>

        <div class="grid md:grid-cols-2 gap-5">

            <div>
                <label>Game</label>

                <select class="w-full p-4 mt-2 rounded-xl bg-[#0F0C24]">

                    <option>Zenless Zone Zero</option>
                    <option>Wuthering Waves</option>
                    <option>Honkai Star Rail</option>

                </select>
            </div>

            <div>
                <label>Layanan</label>

                <select class="w-full p-4 mt-2 rounded-xl bg-[#0F0C24]">

                    <option>Story Quest</option>
                    <option>Daily Farming</option>
                    <option>Leveling</option>

                </select>
            </div>

        </div>

        <div class="mt-5">

            <label>UID / ID Game</label>

            <input type="text" class="w-full mt-2 p-4 rounded-xl bg-[#0F0C24]">

        </div>

        <div class="mt-5">

            <label>Catatan</label>

            <textarea rows="4" class="w-full mt-2 p-4 rounded-xl bg-[#0F0C24]"></textarea>

        </div>

        <button class="mt-6 bg-purple-600 px-8 py-3 rounded-xl">

            Buat Order

        </button>

    </form>

</div>

@endsection