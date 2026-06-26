@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    

    <!-- HEADER -->
    <div class="flex items-center justify-between">
    
    <div>
        <h1 class="text-3xl font-bold text-white">
            🎮 Kelola Game
        </h1>

        <p class="text-gray-400 mt-2">
            Tambah, edit, dan kelola game yang tersedia pada layanan joki.
        </p>
    </div>

    <a href="{{ route('admin.game.create') }}"
       class="bg-purple-600 hover:bg-purple-700 text-white px-5 py-3 rounded-lg transition duration-200">
        + Tambah Game
    </a>

</div>
    
    
    <!-- peringatan -->
    {{-- ALERT SUCCESS --}}
    @if(session('success'))
    <div class="bg-green-500/20 border border-green-500 text-green-300 p-4 rounded-xl">
        {{ session('success') }}
    </div>
    @endif

    {{-- ALERT ERROR --}}
    @if ($errors->any())
    <div class="bg-red-500/20 border border-red-500 text-red-300 p-4 rounded-xl">
        <ul class="list-disc ml-5">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- TABEL GAME -->
    <div class="bg-[#1f1b3a] rounded-2xl overflow-hidden border border-purple-800">

        <table class="w-full text-white">

            <thead class="bg-purple-700">

                <tr>
                    <th class="p-4">Sampul</th>
                    <th class="p-4">Nama Game</th>
                    <th class="p-4">Kategori</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($games as $game)

                <tr class="border-b border-purple-900">

                    <!-- THUMBNAIL -->
                    <td class="p-4">

                        @if($game->thumbnail)

                        <img
                            src="{{ asset('storage/'.$game->thumbnail) }}"
                            class="w-20 h-20 object-cover rounded-lg">

                        @else

                        <div class="w-20 h-20 bg-gray-700 rounded-lg flex items-center justify-center">
                            🎮
                        </div>

                        @endif

                    </td>

                    <!-- NAMA -->
                    <td class="p-4 font-semibold">
                        {{ $game->nama_game }}
                    </td>

                    <!-- KATEGORI -->
                    <td class="p-4">
                        {{ $game->kategori }}
                    </td>

                    <!-- STATUS -->
                    <td class="p-4">

                        @if($game->status == 'aktif')

                        <span class="bg-green-500/20 text-green-400 px-3 py-1 rounded-full text-sm">
                            Aktif
                        </span>

                        @else

                        <span class="bg-red-500/20 text-red-400 px-3 py-1 rounded-full text-sm">
                            Nonaktif
                        </span>

                        @endif

                    </td>

                    <!-- AKSI -->
                    <td class="p-4">

                        <div class="flex justify-center gap-2">

                            <button
                                type="button"
                                data-id="{{ $game->id }}"
                                data-nama="{{ $game->nama_game }}"
                                data-kategori="{{ $game->kategori }}"
                                data-deskripsi="{{ $game->deskripsi }}"
                                data-status="{{ $game->status }}"
                                onclick="openEditModal(this)"
                                class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg">

                                Edit

                            </button>

                            <form
                                action="{{ route('admin.games.destroy',$game->id) }}"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Hapus game ini?')"
                                    class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg">

                                    Hapus

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5" class="p-8 text-center text-gray-400">

                        Belum ada data game

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<!-- MODAL EDIT -->
<div
    id="editModal"
    class="fixed inset-0 bg-black/70 hidden items-center justify-center z-50">

    <div class="bg-[#1f1b3a] w-full max-w-lg rounded-2xl p-6">

        <div class="flex justify-between items-center mb-5">

            <h2 class="text-xl font-bold text-white">
                Edit Game
            </h2>

            <button
                type="button"
                onclick="closeEditModal()"
                class="text-white text-3xl">

                &times;

            </button>

        </div>

        <form
            id="editForm"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="space-y-4">


                <input
                    type="text"
                    id="edit_nama_game"
                    name="nama_game"
                    required
                    class="w-full bg-[#2b2650] text-white rounded-lg p-3">

                <input
                    type="text"
                    id="edit_kategori"
                    name="kategori"
                    required
                    class="w-full bg-[#2b2650] text-white rounded-lg p-3">

                <select
                    id="edit_status"
                    name="status"
                    required
                    class="w-full bg-[#2b2650] text-white rounded-lg p-3">

                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>

                </select>
                <textarea
                    id="edit_deskripsi"
                    name="deskripsi"
                    rows="4"
                    class="w-full bg-[#2b2650] text-white rounded-lg p-3"></textarea>

                <input
                    type="file"
                    name="thumbnail"
                    accept="image/*"
                    class="w-full bg-[#2b2650] text-white rounded-lg p-3">



                <button
                    type="submit"
                    class="w-full bg-purple-600 hover:bg-purple-700 py-3 rounded-lg text-white font-semibold">

                    Simpan Perubahan

                </button>

            </div>

        </form>

    </div>

</div>

<script>
    function openEditModal(btn) {
        document.getElementById('editModal').classList.remove('hidden');
        document.getElementById('editModal').classList.add('flex');

        document.getElementById('edit_deskripsi').value =
            btn.dataset.deskripsi;

        document.getElementById('edit_nama_game').value =
            btn.dataset.nama;

        document.getElementById('edit_kategori').value =
            btn.dataset.kategori;

        document.getElementById('edit_status').value =
            btn.dataset.status;

        document.getElementById('editForm').action =
            "{{ url('/admin/games') }}/" + btn.dataset.id;
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
        document.getElementById('editModal').classList.remove('flex');
    }

    window.onclick = function(event) {
        let modal = document.getElementById('editModal');

        if (event.target === modal) {
            closeEditModal();
        }
    }
</script>

@endsection