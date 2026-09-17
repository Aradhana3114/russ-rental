@extends('layouts.app')

@section('title', 'Tim — Russ Rental')

@section('content')

<section class="bg-cream py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-xs text-brand-dark/40 mb-4"><a href="{{ route('home') }}" class="hover:text-brand">Beranda</a> <span class="mx-1">/</span> Tim</p>
        <span class="text-[11px] uppercase tracking-wide bg-white text-brand px-3 py-1.5 rounded-full border border-brand/20">Tim Kami</span>
        <h1 class="font-serif text-4xl mt-5 text-brand-dark">Tim <span class="text-brand italic">Russ Rental</span></h1>
        <p class="mt-4 text-brand-dark/60 max-w-2xl">Tim profesional yang berdedikasi untuk memberikan pelayanan terbaik dan memastikan kenyamanan pengalaman anda dalam meminjam di RUSS Rental.</p>
    </div>
</section>

<section class="py-14 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-end justify-between mb-8">
            <div>
                <p class="text-xs uppercase tracking-[0.2em] text-brand font-semibold mb-2">Tim Manajemen</p>
                <h2 class="font-serif text-3xl text-brand-dark">Memimpin dengan Profesional</h2>
            </div>
        </div>

        <!-- Semua anggota tim dalam 1 grid uniform -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($team as $member)
                <div class="rounded-2xl border border-brand/10 p-4 flex items-center gap-4">
                    <img src="{{ $member->foto ? asset('storage/'.$member->foto) : 'https://placehold.co/200x200?text='.urlencode($member->nama) }}"
                         alt="{{ $member->nama }}" class="w-16 h-16 rounded-full object-cover shrink-0">
                    <div class="min-w-0">
                        <p class="text-[10px] uppercase tracking-wide text-brand font-semibold">{{ $member->jabatan }}</p>
                        <h3 class="font-serif text-sm text-brand-dark">{{ $member->nama }}</h3>
                        <p class="text-[11px] text-brand-dark/50 leading-relaxed mt-0.5">{{ Str::limit($member->deskripsi, 80) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-16 bg-cream text-center">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-xs uppercase tracking-[0.2em] text-brand font-semibold mb-2">Tim Sopir</p>
        <h2 class="font-serif text-3xl text-brand-dark mb-2">Sopir Profesional & Berpengalaman</h2>
        <p class="font-serif italic text-2xl text-brand mb-6">Keselamatan dan Kenyamanan Anda Adalah Prioritas</p>
        <p class="text-brand-dark/60 mb-10">Setiap sopir kami telah terlatih dengan baik dan memiliki pengalaman berkendara yang baik untuk memastikan perjalanan Anda aman dan nyaman.</p>

        <div class="grid grid-cols-2 sm:grid-cols-4 gap-8">
            <div><p class="font-serif text-2xl text-brand-dark">5+ Tahun</p><p class="text-[11px] text-brand-dark/40 uppercase">Pengalaman Meminjamkan Mobil Kami</p></div>
            <div><p class="font-serif text-2xl text-brand-dark">Tepat Waktu</p><p class="text-[11px] text-brand-dark/40 uppercase">Pelayanan Cepat</p></div>
            <div><p class="font-serif text-2xl text-brand-dark">Ramah</p><p class="text-[11px] text-brand-dark/40 uppercase">Pelayanan Sopan</p></div>
            <div><p class="font-serif text-2xl text-brand-dark">100%</p><p class="text-[11px] text-brand-dark/40 uppercase">Terpercaya</p></div>
        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-3xl bg-gradient-to-r from-[#2b2019] to-[#4a342a] p-8 sm:p-12 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
            <div>
                <p class="text-[11px] uppercase tracking-[0.2em] text-brand-light mb-2">Bergabung dengan Kami</p>
                <h3 class="font-serif text-2xl sm:text-3xl text-white">Ingin Bergabung dengan Tim Kami?</h3>
                <p class="mt-3 text-white/60 max-w-lg text-sm">Kami terbuka untuk calon sopir profesional dan staf yang ingin memberikan pelayanan terbaik kepada pelanggan.</p>
            </div>
            <div class="flex flex-col gap-3 shrink-0 w-full sm:w-auto">
                <a href="{{ route('contact') }}" class="px-6 py-3 rounded-full bg-brand text-white text-sm font-semibold text-center hover:bg-brand-light transition-colors">Hubungi Kami →</a>
                <a href="{{ route('contact') }}" class="px-6 py-3 rounded-full border border-white/30 text-white text-sm font-semibold text-center hover:bg-white/10 transition-colors">Kirim Lamaran</a>
            </div>
        </div>
    </div>
</section>

@endsection
