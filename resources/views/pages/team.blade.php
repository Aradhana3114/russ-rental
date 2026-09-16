@extends('layouts.app')

@section('title', 'Tim — Russ Rental')

@section('content')

<section class="bg-cream py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-xs text-brand-dark/40 mb-4">Beranda <span class="mx-1">/</span> Tim</p>
        <span class="text-[11px] uppercase tracking-wide bg-white text-brand px-3 py-1.5 rounded-full border border-brand/20">Kolektif · Para Ahli Mobilitas</span>
        <h1 class="font-serif text-4xl mt-5 text-brand-dark">Kenali Para Penggerak <span class="text-brand italic">Russ Rental</span></h1>
        <p class="mt-4 text-brand-dark/60 max-w-2xl">Kolektif berdedikasi yang terdiri dari spesialis otomotif, pakar perhotelan, dan insinyur teknologi — memastikan setiap perjalanan melampaui sekadar transportasi menuju pengalaman istimewa penuh kenyamanan.</p>

        <div class="mt-8 flex gap-8 text-sm">
            <div><p class="font-serif text-2xl text-brand-dark">{{ $team->count() }}+</p><p class="text-xs text-brand-dark/40 uppercase">Unit Premium</p></div>
            <div><p class="font-serif text-2xl text-brand-dark">100%</p><p class="text-xs text-brand-dark/40 uppercase">Sopir Terverifikasi</p></div>
            <div><p class="font-serif text-2xl text-brand-dark">4.98</p><p class="text-xs text-brand-dark/40 uppercase">Indeks Diplomatik</p></div>
        </div>
    </div>
</section>

<section class="py-14 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-end justify-between mb-10">
            <div>
                <p class="text-xs uppercase tracking-[0.2em] text-brand font-semibold mb-2">Guild Eksekutif & Operasional</p>
                <h2 class="font-serif text-3xl text-brand-dark">Memimpin Setiap Perjalanan</h2>
            </div>
        </div>

        @php
            $leaders = $team->take(2);
            $rest = $team->slice(2);
        @endphp

        <!-- Featured leadership: foto & bio berdampingan dalam 1 kartu (sesuai Figma) -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            @foreach($leaders as $member)
                <div class="rounded-2xl border border-brand/10 overflow-hidden grid grid-cols-1 sm:grid-cols-2">
                    <div class="aspect-[4/3] sm:aspect-auto sm:h-full overflow-hidden bg-cream">
                        <img src="{{ $member->foto ? asset('storage/'.$member->foto) : 'https://placehold.co/500x500?text='.urlencode($member->nama) }}"
                             alt="{{ $member->nama }}" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6 flex flex-col justify-between">
                        <div>
                            <p class="text-[10px] uppercase tracking-wide text-brand font-semibold mb-1">{{ $member->jabatan }}</p>
                            <h3 class="font-serif text-xl text-brand-dark mb-3">{{ $member->nama }}</h3>
                            <p class="text-sm text-brand-dark/60 leading-relaxed">{{ $member->deskripsi }}</p>
                        </div>
                        <div class="flex items-center justify-between mt-6 pt-4 border-t border-brand/10">
                            <span class="text-xs text-brand-dark/40">{{ $loop->first ? 'Kepemimpinan Eksekutif' : 'Manajemen Armada' }}</span>
                            <div class="flex gap-2">
                                <span class="w-8 h-8 rounded-full bg-cream flex items-center justify-center text-xs text-brand-dark/50">Tautan</span>
                                <span class="w-8 h-8 rounded-full bg-cream flex items-center justify-center text-xs text-brand-dark/50">Email</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Anggota tim lainnya: grid standar foto atas, teks bawah -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($rest as $member)
                <div class="rounded-2xl overflow-hidden border border-brand/10">
                    <div class="aspect-[4/3] overflow-hidden bg-cream">
                        <img src="{{ $member->foto ? asset('storage/'.$member->foto) : 'https://placehold.co/500x375?text='.urlencode($member->nama) }}"
                             alt="{{ $member->nama }}" class="w-full h-full object-cover">
                    </div>
                    <div class="p-5">
                        <p class="text-[10px] uppercase tracking-wide text-brand font-semibold mb-1">{{ $member->jabatan }}</p>
                        <h3 class="font-serif text-lg text-brand-dark mb-2">{{ $member->nama }}</h3>
                        <p class="text-sm text-brand-dark/60 leading-relaxed mb-4">{{ $member->deskripsi }}</p>
                        <div class="flex gap-2">
                            <span class="w-7 h-7 rounded-full bg-cream flex items-center justify-center text-xs text-brand-dark/50">Tautan</span>
                            <span class="w-7 h-7 rounded-full bg-cream flex items-center justify-center text-xs text-brand-dark/50">Email</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-16 bg-cream text-center">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-xs uppercase tracking-[0.2em] text-brand font-semibold mb-2">Guild Sopir</p>
        <h2 class="font-serif text-3xl text-brand-dark mb-2">Bukan Sekadar Sopir.</h2>
        <p class="font-serif italic text-2xl text-brand mb-6">Penjaga Waktu Perjalanan Anda.</p>
        <p class="text-brand-dark/60 mb-10">Setiap pengemudi Russ Rental lulus seleksi latar belakang menyeluruh, etiket pelayanan bilingual berstandar internasional, serta pelatihan mengemudi defensif tingkat lanjut.</p>

        <div class="grid grid-cols-2 sm:grid-cols-4 gap-8">
            <div><p class="font-serif text-2xl text-brand-dark">120 Jam</p><p class="text-[11px] text-brand-dark/40 uppercase">Pelatihan Tahunan</p></div>
            <div><p class="font-serif text-2xl text-brand-dark">&lt; 3 Menit</p><p class="text-[11px] text-brand-dark/40 uppercase">Buffer Kedatangan</p></div>
            <div><p class="font-serif text-2xl text-brand-dark">6 Tingkat</p><p class="text-[11px] text-brand-dark/40 uppercase">Protokol Preparasi Kabin</p></div>
            <div><p class="font-serif text-2xl text-brand-dark">100%</p><p class="text-[11px] text-brand-dark/40 uppercase">Terverifikasi & Teruji</p></div>
        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-3xl bg-gradient-to-r from-[#2b2019] to-[#4a342a] p-8 sm:p-12 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
            <div>
                <p class="text-[11px] uppercase tracking-[0.2em] text-brand-light mb-2">Bergabung dengan Guild</p>
                <h3 class="font-serif text-2xl sm:text-3xl text-white">Bergerak dengan Keunggulan. <span class="italic text-brand-light block">Bentuk Masa Depan Grand Touring.</span></h3>
                <p class="mt-3 text-white/60 max-w-lg text-sm">Kami secara berkesinambungan mencari liaison concierge berpengalaman, teknisi armada tersertifikasi, dan pengemudi elit yang bangga menghadirkan keramahan otomotif tanpa kompromi.</p>
            </div>
            <div class="flex flex-col gap-3 shrink-0 w-full sm:w-auto">
                <a href="{{ route('contact') }}" class="px-6 py-3 rounded-full bg-brand text-white text-sm font-semibold text-center hover:bg-brand-light transition-colors">Lamar Sekarang →</a>
                <a href="{{ route('contact') }}" class="px-6 py-3 rounded-full border border-white/30 text-white text-sm font-semibold text-center hover:bg-white/10 transition-colors">Hubungi Guild Sopir</a>
            </div>
        </div>
    </div>
</section>

@endsection
