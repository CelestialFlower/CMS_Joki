@extends('layouts.admin')

@section('content')


<div class="space-y-6">

<!-- PREVIEW GAME -->
<div class="grid md:grid-cols-4 gap-4">

    @forelse($games as $game)

    <div class="bg-[#2b2650] rounded-xl overflow-hidden shadow-lg">

        @if($game->thumbnail)

<img
    src="{{ asset('storage/'.$game->thumbnail) }}"
    class="w-full h-40 object-cover">

@else

<img
    src="https://placehold.co/400x220?text=No+Image"
    class="w-full h-40 object-cover">

@endif

        <div class="p-4">

            <h3 class="text-white font-bold text-lg">
                {{ $game->nama_game }}
            </h3>

            <p class="text-gray-400 text-sm mt-1">
                {{ $game->kategori }}
            </p>

            <div class="mt-3">

                @if($game->status == 'aktif')

                    <span class="bg-green-500/20 text-green-400 px-3 py-1 rounded-full text-xs">
                        Aktif
                    </span>

                @else

                    <span class="bg-red-500/20 text-red-400 px-3 py-1 rounded-full text-xs">
                        Nonaktif
                    </span>

                @endif

            </div>

        </div>

    </div>

    @empty

    <div class="col-span-4 text-center text-gray-400 py-10">
        Belum ada game
    </div>

    @endforelse

</div>

    <!-- FORM TAMBAH GAME -->
    <div class="bg-[#1f1b3a] p-6 rounded-2xl">

        <h2 class="text-xl font-bold text-white mb-4">
            Tambah Game
        </h2>

        <form
    action="{{ route('admin.games.store') }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf

    <div class="grid md:grid-cols-4 gap-4">

        <input
            type="text"
            name="nama_game"
            placeholder="Nama Game"
            required
            class="bg-[#2b2650] text-white rounded-lg p-3">

        <input
            type="text"
            name="kategori"
            placeholder="Kategori"
            required
            class="bg-[#2b2650] text-white rounded-lg p-3">
            

        <select
            name="status"
            class="bg-[#2b2650] text-white rounded-lg p-3">

            <option value="aktif">Aktif</option>
            <option value="nonaktif">Nonaktif</option>

        </select>

        <input
            type="file"
            name="thumbnail"
            accept="image/*"
            class="bg-[#2b2650] text-white rounded-lg p-3">

    </div>

    <button
        type="submit"
        class="mt-4 bg-purple-600 hover:bg-purple-700 px-5 py-2 rounded-lg text-white">

        Simpan Game

    </button>

</form>

    </div>

    <!-- TABEL GAME -->
    <div class="bg-[#1f1b3a] rounded-2xl overflow-hidden">

        <table class="w-full text-white">

            <thead class="bg-purple-700">

                <tr>
    <th class="p-4">Sampul</th>
    <th class="p-4">Nama Game</th>
    <th class="p-4">Kategori</th>
    <th class="p-4">Status</th>
    <th class="p-4">Aksi</th>
</tr>

            </thead>

            <tbody>

                @forelse($games as $game)

                <tr class="border-b border-purple-900">

                    <td class="p-4">

    @if($game->thumbnail)

        <img
            src="{{ asset('storage/'.$game->thumbnail) }}"
            class="w-20 h-20 rounded-lg object-cover">

    @else

        <div
            class="w-20 h-20 bg-gray-700 rounded-lg flex items-center justify-center">

            🎮

        </div>

    @endif

</td>

                    <td class="p-4">
                        {{ $game->kategori }}
                    </td>

                    <td class="p-4">
                        {{ $game->status }}
                    </td>

                    <td class="p-4">

                        <div class="flex gap-2">

                            <button
    type="button"
    data-id="{{ $game->id }}"
    data-nama="{{ $game->nama_game }}"
    data-kategori="{{ $game->kategori }}"
    data-status="{{ $game->status }}"
    onclick="openEditModal(this)"
    class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded">

    Edit

</button>
                            <form
                                action="{{ route('admin.games.destroy',$game->id) }}"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="bg-red-600 px-3 py-1 rounded">

                                    Hapus

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="4" class="p-4 text-center text-gray-400">

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
<div>

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
            placeholder="Nama Game"
            class="w-full bg-[#2b2650] text-white rounded-lg p-3">

        <input
            type="text"
            id="edit_kategori"
            name="kategori"
            placeholder="Kategori"
            class="w-full bg-[#2b2650] text-white rounded-lg p-3">

        <select
            id="edit_status"
            name="status"
            class="w-full bg-[#2b2650] text-white rounded-lg p-3">

            <option value="aktif">Aktif</option>
            <option value="nonaktif">Nonaktif</option>

        </select>

        <!-- THUMBNAIL -->
        <div>

            <label class="text-gray-300">
                Ganti Sampul
            </label>

            <input
                type="file"
                name="thumbnail"
                accept="image/*"
                class="w-full mt-2 bg-[#2b2650] text-white rounded-lg p-3">

        </div>

        <button
            type="submit"
            class="w-full bg-purple-600 hover:bg-purple-700 py-3 rounded-lg text-white font-semibold">

            Simpan Perubahan

        </button>

    </div>

</form>

</div>
</div>

</div>

<script>

function openEditModal(btn)
{
    let id = btn.dataset.id;

    document.getElementById('editModal')
        .classList.remove('hidden');

    document.getElementById('editModal')
        .classList.add('flex');

    document.getElementById('edit_nama_game').value =
        btn.dataset.nama;

    document.getElementById('edit_kategori').value =
        btn.dataset.kategori;

    document.getElementById('edit_status').value =
        btn.dataset.status;

    document.getElementById('editForm').action =
        "{{ url('/admin/games') }}/" + id;
}

function closeEditModal()
{
    document.getElementById('editModal')
        .classList.add('hidden');

    document.getElementById('editModal')
        .classList.remove('flex');
}

window.onclick = function(event)
{
    let modal = document.getElementById('editModal');

    if(event.target === modal)
    {
        closeEditModal();
    }
}

</script>

@endsection