@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    

    <!-- HEADER -->
    <div class="flex items-center justify-between">
    
<div>
        <h1 class="text-3xl font-bold text-white">
            Kelola Aritikel
        </h1>

        <p class="text-gray-400 mt-2">
            Tambah, edit, dan kelola Artikel Anda
        </p>
    </div>

    <a href="{{ route('admin.artikel.create') }}"
   class="bg-purple-600 hover:bg-purple-700 text-white px-5 py-3 rounded-lg">
    + Tambah Artikel
    </a>

</div>
{{-- ALERT SUCCESS --}}
@if(session('success'))
<div class="bg-green-500/20 border border-green-500 text-green-300 p-4 rounded-xl mb-4">
    {{ session('success') }}
</div>
@endif

{{-- ALERT ERROR --}}
@if($errors->any())
<div class="bg-red-500/20 border border-red-500 text-red-300 p-4 rounded-xl mb-4">
    <p class="font-semibold mb-2">Gagal menyimpan artikel!</p>
    <ul class="list-disc ml-5">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="space-y-6">

    <table class="w-full text-white">

        <thead class="bg-[#2b2650] rounded-2xl overflow-hidden border border-purple-800">
            <tr>
                <th>Thumbnail</th>
                <th>Game</th>
                <th>Judul</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody class="bg-[#1f1b3a] rounded-2xl overflow-hidden border border-purple-800">

            @forelse($artikels as $artikel)

            <tr class="border-b border-purple-900">


                <td class="p-10">

                    @if($artikel->thumbnail)

                    <img
                        src="{{ asset('storage/'.$artikel->thumbnail) }}"
                        class="w-20 h-20 object-cover rounded-lg">

                    @else

                    <div class="w-20 h-20 bg-gray-700 rounded-lg flex items-center justify-center">
                        📰
                    </div>

                    @endif

                </td>

                <td class="p-10 text-white">
                    {{ $artikel->game->nama_game }}
                </td>

                <td class="p-10 text-white font-semibold">
                    {{ $artikel->judul }}
                </td>

                <td class="p-10">

                    @if($artikel->status == 'publish')

                    <span class="bg-green-500/20 text-green-400 px-3 py-1 rounded-full text-xs">
                        Publish
                    </span>

                    @else

                    <span class="bg-yellow-500/20 text-yellow-400 px-3 py-1 rounded-full text-xs">
                        Draft
                    </span>

                    @endif

                </td>

                <td class="p-10">

                    <div class="flex gap-2">

                        <button
                            type="button"
                            data-id="{{ $artikel->id }}"
                            data-judul="{{ $artikel->judul }}"
                            data-status="{{ $artikel->status }}"
                            data-game="{{ $artikel->game_id }}"
                            data-isi="{{ $artikel->isi }}"
                            onclick="openEditArtikel(this)"
                            class="bg-blue-600 hover:bg-blue-700 px-3 py-2 rounded-lg text-white">

                            Edit

                        </button>

                        <form
                            action="{{ route('admin.artikel.destroy',$artikel->id) }}"
                            method="POST">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Hapus artikel ini?')"
                                class="bg-red-600 hover:bg-red-700 px-3 py-2 rounded-lg text-white">

                                Hapus

                            </button>

                        </form>

                    </div>

                </td>


            </tr>
            

            @empty

            <tr>


                <td colspan="5"
                    class="text-center py-10 text-gray-400">

                    Belum ada artikel

                </td>


            </tr>

            @endforelse

        </tbody>


    </table>
    <div
        id="editArtikelModal"
        class="fixed inset-0 bg-black/70 hidden items-center justify-center z-50">


        <div class="bg-[#1f1b3a] w-full max-w-2xl rounded-2xl p-6">

            <div class="flex justify-between mb-5">

                <h2 class="text-xl font-bold text-white">
                    Edit Artikel
                </h2>

                <button
                    onclick="closeEditArtikel()"
                    class="text-white text-3xl">

                    &times;

                </button>

            </div>

            <form
                id="editArtikelForm"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <input
                    type="text"
                    id="edit_judul"
                    name="judul"
                    class="w-full bg-[#2b2650] text-white p-3 rounded-lg mb-3">

                <textarea
                    id="edit_isi"
                    name="isi"
                    rows="8"
                    class="w-full bg-[#2b2650] text-white p-3 rounded-lg mb-3"></textarea>

                <select
                    id="edit_status"
                    name="status"
                    class="w-full bg-[#2b2650] text-white p-3 rounded-lg mb-3">

                    <option value="publish">Publish</option>
                    <option value="draft">Draft</option>

                </select>

                <button
                    type="submit"
                    class="w-full bg-purple-600 py-3 rounded-lg text-white">

                    Simpan Perubahan

                </button>

            </form>

        </div>


    </div>

</div>
<script>
    function openEditArtikel(btn) {
        let id = btn.dataset.id;

        document.getElementById('editArtikelModal')
            .classList.remove('hidden');

        document.getElementById('editArtikelModal')
            .classList.add('flex');

        document.getElementById('edit_judul').value =
            btn.dataset.judul;

        document.getElementById('edit_isi').value =
            btn.dataset.isi;

        document.getElementById('edit_status').value =
            btn.dataset.status;

        document.getElementById('editArtikelForm').action =
            "{{ url('/admin/artikel') }}/" + id;
    }

    function closeEditArtikel() {
        document.getElementById('editArtikelModal')
            .classList.add('hidden');

        document.getElementById('editArtikelModal')
            .classList.remove('flex');
    }

    window.onclick = function(event) {
        let modal =
            document.getElementById('editArtikelModal');

        if (event.target === modal) {
            closeEditArtikel();
        }
    }
</script>
@endsection