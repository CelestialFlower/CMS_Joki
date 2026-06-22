@extends('layouts.user')

@section('content')

{{-- POPUP SUSPENDED --}}
@if(session('suspended'))
<div id="popup-overlay"
     style="position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 999;
            display: flex; align-items: center; justify-content: center;">

    <div style="background: #fff; border-radius: 12px; padding: 2rem 1.75rem;
                max-width: 380px; width: 90%; text-align: center; position: relative;">

        {{-- Ikon warning --}}
        <div style="width: 56px; height: 56px; border-radius: 50%; background: #fef2f2;
                    display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none"
                 stroke="#ef4444" stroke-width="2" viewBox="0 0 24 24">
                <path d="M12 9v4m0 4h.01M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/>
            </svg>
        </div>

        <h3 style="font-size: 1.1rem; font-weight: 600; color: #111827; margin: 0 0 0.5rem;">
            Tidak Dapat Melakukan Pesanan
        </h3>

        <p style="font-size: 0.875rem; color: #6b7280; margin: 0 0 1.5rem; line-height: 1.6;">
            Akun Anda sedang dalam status <strong style="color: #ef4444;">suspend</strong>.
            Silakan hubungi admin untuk informasi lebih lanjut.
        </p>

        <button onclick="document.getElementById('popup-overlay').style.display='none'"
                style="background: #111827; color: #fff; border: none; border-radius: 8px;
                       padding: 0 24px; height: 38px; font-size: 0.875rem;
                       font-weight: 500; cursor: pointer; width: 100%;">
            Mengerti
        </button>

    </div>
</div>
@endif

{{-- FORM PESANAN --}}
<div style="max-width: 480px; margin: 2rem auto; padding: 0 1rem;">

    <h2 style="font-size: 1.375rem; font-weight: 500; margin: 0 0 0.25rem;">Buat Pesanan</h2>
    <p style="font-size: 0.875rem; color: #6b7280; margin: 0 0 1.75rem;">Isi detail pesanan kamu di bawah ini.</p>

    <form method="POST" action="{{ route('user.order.store') }}"
          style="background: #fff; border: 1px solid #e5e7eb; border-radius: 12px;
                 padding: 1.5rem; display: flex; flex-direction: column; gap: 1.25rem;">

        @csrf

        {{-- Nama & Email --}}
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
            <div>
                <label style="display: block; font-size: 0.8125rem; color: #6b7280; margin-bottom: 6px;">Nama</label>
                <div style="display: flex; align-items: center; gap: 8px; background: #f9fafb;
                            border: 1px solid #e5e7eb; border-radius: 8px; padding: 0 12px; height: 36px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                         stroke="#9ca3af" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/>
                    </svg>
                    <span style="font-size: 0.875rem; color: #9ca3af;">{{ auth()->user()->name }}</span>
                </div>
            </div>
            <div>
                <label style="display: block; font-size: 0.8125rem; color: #6b7280; margin-bottom: 6px;">Email</label>
                <div style="display: flex; align-items: center; gap: 8px; background: #f9fafb;
                            border: 1px solid #e5e7eb; border-radius: 8px; padding: 0 12px; height: 36px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                         stroke="#9ca3af" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="2" y="4" width="20" height="16" rx="2"/><path d="m2 7 10 7 10-7"/>
                    </svg>
                    <span style="font-size: 0.875rem; color: #9ca3af;">{{ auth()->user()->email }}</span>
                </div>
            </div>
        </div>

        {{-- Pilih Game --}}
        <div>
            <label style="display: block; font-size: 0.8125rem; color: #6b7280; margin-bottom: 6px;">Pilih Game</label>
            <div style="position: relative;">
                <select name="game_id"
                        style="width: 100%; padding: 0 36px 0 12px; height: 36px; font-size: 0.875rem;
                               border-radius: 8px; border: 1px solid #e5e7eb; background: #fff;
                               color: #111827; appearance: none; cursor: pointer;">
                    @foreach($games as $game)
                        <option value="{{ $game->id }}">{{ $game->nama_game }}</option>
                    @endforeach
                </select>
                <svg style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%);
                            pointer-events: none;"
                     xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                     stroke="#9ca3af" stroke-width="2" viewBox="0 0 24 24">
                    <path d="m6 9 6 6 6-6"/>
                </svg>
            </div>
        </div>

        {{-- Nomor HP --}}
        <div>
            <label style="display: block; font-size: 0.8125rem; color: #6b7280; margin-bottom: 6px;">Nomor HP</label>
            <div style="position: relative;">
                <svg style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%);
                            pointer-events: none;"
                     xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                     stroke="#9ca3af" stroke-width="2" viewBox="0 0 24 24">
                    <rect x="5" y="2" width="14" height="20" rx="2"/><circle cx="12" cy="17" r="1"/>
                </svg>
                <input type="text" name="nomor_hp" placeholder="Contoh: 08123456789"
                       style="width: 100%; box-sizing: border-box; padding: 0 12px 0 34px;
                              height: 36px; font-size: 0.875rem; border-radius: 8px;
                              border: 1px solid #e5e7eb; color: #111827;" />
            </div>
        </div>

        {{-- Submit --}}
        <div style="border-top: 1px solid #e5e7eb; padding-top: 1.25rem; display: flex; justify-content: flex-end;">
            <button type="submit"
                    style="background: #111827; color: #fff; border: none; border-radius: 8px;
                           padding: 0 20px; height: 36px; font-size: 0.875rem;
                           font-weight: 500; cursor: pointer;">
                Pesan Sekarang
            </button>
        </div>

    </form>
</div>

@endsection