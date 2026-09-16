@extends('layouts.app')

@section('title', 'Tentang Kami — Russ Rental')

@section('content')

<section class="bg-cream py-14">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-xs text-brand-dark/40 mb-4">Beranda <span class="mx-1">/</span> Tentang Kami</p>
        <span class="text-[11px] uppercase tracking-wide bg-white text-brand px-3 py-1.5 rounded-full border border-brand/20">Mobilitas Konsierge Khusus</span>
        <h1 class="font-serif text-4xl mt-5 text-brand-dark">Tentang Russ Rental</h1>
        <p class="mt-4 text-brand-dark/60 max-w-2xl">Satu dekade menghadirkan standar terdepan dalam layanan private transit eksekutif, precision chauffeuring, dan luxury automotive leasing di seluruh Asia Tenggara.</p>
    </div>
</section>

<section class="py-14 bg-cream">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
        <div>
            <div class="rounded-2xl overflow-hidden relative">
                <img src="https://placehold.co/700x500?text=Russ+Rental+Lounge" alt="Russ Rental Lounge" class="w-full h-72 object-cover">
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-4">
                    <p class="text-white text-sm font-semibold flex items-center gap-1">Nomor Registry Armada Pribadi No. 2015-JKT</p>
                    <p class="text-white/70 text-xs">Operator Transportasi Eksekutif Tersertifikasi</p>
                </div>
            </div>

            <!-- Stats card terpisah, bukan menyatu dengan teks -->
            <div class="mt-4 bg-white rounded-2xl grid grid-cols-3 divide-x divide-brand/10 text-center py-5 shadow-sm">
                <div>
                    <p class="font-serif text-2xl text-brand">{{ $stats['fleet'] ?? '150+' }}</p>
                    <p class="text-[10px] text-brand-dark/50 uppercase tracking-wide">Unit Armada</p>
                </div>
                <div>
                    <p class="font-serif text-2xl text-brand">{{ $stats['journeys'] ?? '12k+' }}</p>
                    <p class="text-[10px] text-brand-dark/50 uppercase tracking-wide">Perjalanan</p>
                </div>
                <div>
                    <p class="font-serif text-2xl text-brand">{{ $stats['ontime'] ?? '99.8%' }}</p>
                    <p class="text-[10px] text-brand-dark/50 uppercase tracking-wide">Tepat Waktu</p>
                </div>
            </div>
        </div>

        <div>
            <p class="text-xs uppercase tracking-[0.2em] text-brand font-semibold mb-2">Filosofi Kami</p>
            <h2 class="font-serif text-3xl text-brand-dark mb-4">Dibuat untuk Wisatawan Berkelas</h2>
            <p class="text-brand-dark/60 leading-relaxed mb-4">Kemewahan sejati dalam mobilitas dirasakan melalui kenyamanan tanpa friksi. Setiap detail layanan dirancang dengan cermat guna menghadirkan ketepatan waktu, ketenangan seamless, serta keeleganan yang paripurna.</p>
            <p class="text-brand-dark/60 leading-relaxed mb-6">Dari depot utama kami di Jakarta dan Bali, para sopir terpilih serta armada berstandar diplomatik senantiasa siap melayani delegasi kenegaraan maupun agenda private touring eksklusif Anda.</p>

            <div class="border-t border-brand/10 pt-6 flex items-center justify-between">
                <h3 class="font-semibold text-brand-dark">Satu Dekade Pencapaian</h3>
                <span class="text-xs text-brand-dark/40">2015 – Sekarang</span>
            </div>

            <div class="mt-4 grid grid-cols-2 gap-4">
                <div class="bg-milestone rounded-xl p-4">
                    <p class="text-xs font-semibold text-brand mb-1">2015</p>
                    <p class="font-semibold text-brand-dark text-sm mb-1">Awal Mula SCBD</p>
                    <p class="text-xs text-brand-dark/60 leading-relaxed">Peluncuran armada flagship Mercedes-Benz untuk delegasi diplomatik dan pimpinan multinasional.</p>
                </div>
                <div class="bg-milestone rounded-xl p-4">
                    <p class="text-xs font-semibold text-brand mb-1">2025</p>
                    <p class="font-semibold text-brand-dark text-sm mb-1">Ekspansi Regional</p>
                    <p class="text-xs text-brand-dark/60 leading-relaxed">Ekspansi armada zero-emission luxury MPV dan transit hub premium di penjuru Asia Tenggara.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-cream text-center">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-xs uppercase tracking-[0.2em] text-brand font-semibold mb-2">Tujuan & Visi</p>
        <h2 class="font-serif text-3xl text-brand-dark mb-3">Arsitektur Pedoman</h2>
        <p class="text-brand-dark/60 mb-12">Membangun standar baru dalam bespoke transit melalui disiplin presisi dan keramahan berkelas dunia.</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-10 text-left">
            <div>
                <p class="text-xs uppercase tracking-wide text-brand font-semibold mb-2">Visi</p>
                <h3 class="font-serif text-xl text-brand-dark mb-3">Cakrawala yang Kami Bangun</h3>
                <p class="text-sm text-brand-dark/60 leading-relaxed">"Menjadi tolak ukur automotive concierge terdepan di Asia Tenggara yang memadukan mobilitas ultra-luxury, armada zero-emission, dan pelayanan eksekutif berdisiplin tinggi."</p>
            </div>
            <div>
                <p class="text-xs uppercase tracking-wide text-brand font-semibold mb-2">Misi</p>
                <h3 class="font-serif text-xl text-brand-dark mb-3">Komitmen Harian Kami</h3>
                <p class="text-sm text-brand-dark/60 leading-relaxed">"Menjamin keselamatan penumpang tanpa kompromi, higienitas armada berstandar tinggi, transparansi tarif korporasi, serta layanan terpersonalisasi bagi setiap tamu kehormatan."</p>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p class="text-xs uppercase tracking-[0.2em] text-brand font-semibold mb-2">Standar Tanpa Kompromi</p>
        <h2 class="font-serif text-3xl text-brand-dark mb-12">Empat Pilar Utama</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 text-left">
            <div>
                <p class="font-serif text-2xl text-brand mb-2">01</p>
                <h3 class="font-semibold text-brand-dark mb-2">Keselamatan Utama</h3>
                <p class="text-sm text-brand-dark/60">Audit berkala yang ketat serta pengemudi tersertifikasi defensive driving berstandar internasional.</p>
            </div>
            <div>
                <p class="font-serif text-2xl text-brand mb-2">02</p>
                <h3 class="font-semibold text-brand-dark mb-2">Armada Premium</h3>
                <p class="text-sm text-brand-dark/60">Unit eksklusif generasi terbaru untuk luxury sedan dan prestige MPV dengan usia operasional di bawah 3 tahun.</p>
            </div>
            <div>
                <p class="font-serif text-2xl text-brand mb-2">03</p>
                <h3 class="font-semibold text-brand-dark mb-2">Harga Transparan</h3>
                <p class="text-sm text-brand-dark/60">Kebijakan bahan bakar transparan, proteksi asuransi komprehensif, tanpa biaya tersembunyi.</p>
            </div>
            <div>
                <p class="font-serif text-2xl text-brand mb-2">04</p>
                <h3 class="font-semibold text-brand-dark mb-2">Cepat & Sempurna</h3>
                <p class="text-sm text-brand-dark/60">Konfirmasi pemesanan cepat dalam 15 menit didukung layanan dedicated fleet support desk 24/7.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-cream">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-3xl bg-gradient-to-r from-[#2b2019] to-[#4a342a] p-8 sm:p-12 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
            <div>
                <p class="text-[11px] uppercase tracking-[0.2em] text-brand-light mb-2">Rasakan Kemewahan Berbeda</p>
                <h3 class="font-serif text-2xl sm:text-3xl text-white">Booking Perjalanan Eksekutif Berikutnya</h3>
                <p class="mt-3 text-white/60 max-w-lg text-sm">Baik untuk penyambutan VIP di bandara, agenda kenegaraan, maupun private touring, hubungi concierge desk kami untuk booking unit yang dipersonalisasi.</p>
            </div>
            <div class="flex flex-col gap-3 shrink-0 w-full sm:w-auto">
                <a href="{{ route('booking') }}" class="px-6 py-3 rounded-full bg-brand text-white text-sm font-semibold text-center hover:bg-brand-light transition-colors">Pesan Kendaraan</a>
                <a href="{{ route('contact') }}" class="px-6 py-3 rounded-full border border-white/30 text-white text-sm font-semibold text-center hover:bg-white/10 transition-colors">Hubungi Konsierge</a>
            </div>
        </div>
    </div>
</section>

@endsection
