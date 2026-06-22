@extends('layouts.admin')


@section('content')

<div class="space-y-6">

    {{-- HEADER --}}

    {{-- ALERT --}}
    @if(session('success'))
    <div class="bg-green-500/20 border border-green-500 text-green-400 px-5 py-3 rounded-xl">
        {{ session('success') }}
    </div>
    @endif

    {{-- STATISTIK --}}
    <div class="grid md:grid-cols-4 gap-6">

        <!-- Total Pelanggan -->
        <div class="bg-[#1f1b3a] border border-purple-800 rounded-2xl p-6">
            <p class="text-gray-400">Total Pelanggan</p>
            <h2 class="text-3xl font-bold text-white mt-2">
                {{ $totalPelanggan }}
            </h2>
        </div>

        <!-- Aktif -->
        <div class="bg-[#1f1b3a] border border-purple-800 rounded-2xl p-6">
            <p class="text-gray-400">Aktif</p>
            <h2 class="text-3xl font-bold text-green-400 mt-2">
                {{ $aktif }}
            </h2>
        </div>

        <!-- Suspend -->
        <div class="bg-[#1f1b3a] border border-purple-800 rounded-2xl p-6">
            <p class="text-gray-400">Suspend</p>
            <h2 class="text-3xl font-bold text-red-400 mt-2">
                {{ $suspend }}
            </h2>
        </div>

        <!-- Order Hari Ini -->
        <div class="bg-[#1f1b3a] border border-purple-800 rounded-2xl p-6">
            <p class="text-gray-400">Order Hari Ini</p>
            <h2 class="text-3xl font-bold text-yellow-400 mt-2">
                {{ $orderHariIni }}
            </h2>
        </div>

    </div>


    <!-- TABLE -->
    <div class="bg-[#1f1b3a] border border-purple-800 rounded-2xl overflow-hidden">

        <table class="w-full">

            <thead class="bg-purple-700 text-white">

                <tr>
                    <th class="p-4 text-left">ID</th>
                    <th class="p-4 text-left">Nama</th>
                    <th class="p-4 text-left">Email</th>
                    <th class="p-4 text-left">Total Order</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>

            </thead>

            <tbody class="text-white">



                @forelse($pelanggan as $user)

                <tr class="border-b border-purple-900">

                    <td class="p-4">
                        {{ $user->id }}
                    </td>

                    <td class="p-4 font-semibold">
                        {{ $user->name }}
                    </td>

                    <td class="p-4">
                        {{ $user->email }}
                    </td>


                    <td class="p-4">
                        {{ $user->orders_count }}
                    </td>

                    <td class="p-4">

                        @if($user->status == 'aktif')

                        <span class="bg-green-500/20 text-green-400 px-3 py-1 rounded-full">
                            Aktif
                        </span>

                        @else

                        <span class="bg-red-500/20 text-red-400 px-3 py-1 rounded-full">
                            Suspend
                        </span>

                        @endif

                    </td>

                    <td class="p-4">

                        <div class="flex justify-center gap-2">


                            <form
                                action="{{ route('admin.costumer.status',$user->id) }}"
                                method="POST">

                                @csrf
                                @method('PUT')

                                <input
                                    type="hidden"
                                    name="status"
                                    value="{{ $user->status == 'aktif' ? 'suspend' : 'aktif' }}">

                                <button
                                    class="px-3 py-2 rounded-lg text-sm
        {{ $user->status == 'aktif'
            ? 'bg-red-600 hover:bg-red-700'
            : 'bg-green-600 hover:bg-green-700' }}">

                                    {{ $user->status == 'aktif'
            ? 'Suspend'
            : 'Aktifkan' }}

                                </button>

                            </form>
                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7"
                        class="text-center py-8 text-gray-400">

                        Belum ada pelanggan

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>
@endsection