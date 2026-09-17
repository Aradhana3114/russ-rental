@extends('layouts.app')

@section('title', 'Tentang Kami — Russ Rental')

@section('content')

<section class="bg-cream py-14">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-xs text-brand-dark/40 mb-4"><a href="{{ route('home') }}" class="hover:text-brand">Beranda</a> <span class="mx-1">/</span> Tentang Kami</p>
        <span class="text-[11px] uppercase tracking-wide bg-white text-brand px-3 py-1.5 rounded-full border border-brand/20">Rental Mobil Terpercaya</span>
        <h1 class="font-serif text-4xl mt-5 text-brand-dark">Tentang Russ Rental</h1>
        <p class="mt-4 text-brand-dark/60 max-w-2xl">Menyediakan layanan rental mobil berkualitas dengan harga terjangkau dan pelayanan terbaik untuk kebutuhan perjalanan Anda.</p>
    </div>
</section>

<section class="py-14 bg-cream">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
        <div>
            <div class="rounded-2xl overflow-hidden relative">
                <img src="{{ asset('images/russ_comapany.jpg') }}" alt="Russ Rental Company" class="w-full h-72 object-cover">
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-4">
                    <p class="text-white text-sm font-semibold flex items-center gap-1">Terdaftar & Terpercaya</p>
                    <p class="text-white/70 text-xs">Layanan Rental Mobil Profesional</p>
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
            <p class="text-xs uppercase tracking-[0.2em] text-brand font-semibold mb-2">Tentang Kami</p>
            <h2 class="font-serif text-3xl text-brand-dark mb-4">Melayani dengan Sepenuh Hati</h2>
            <p class="text-brand-dark/60 leading-relaxed mb-4">Kami memahami bahwa kenyamanan perjalanan Anda adalah prioritas utama. Setiap mobil dipilih dan dirawat dengan teliti untuk memberikan pengalaman berkendara yang aman dan nyaman.</p>
            <p class="text-brand-dark/60 leading-relaxed mb-6">Dengan kantor utama di Jakarta dan Bali, kami siap melayani kebutuhan rental mobil Anda dengan profesional dan ramah.</p>

            <div class="border-t border-brand/10 pt-6 flex items-center justify-between">
                <h3 class="font-semibold text-brand-dark">Perjalanan Kami</h3>
                <span class="text-xs text-brand-dark/40">2015 – Sekarang</span>
            </div>

            <div class="mt-4 grid grid-cols-2 gap-4">
                <div class="bg-milestone rounded-xl p-4">
                    <p class="text-xs font-semibold text-brand mb-1">2015</p>
                    <p class="font-semibold text-brand-dark text-sm mb-1">Awal Berdirinya Russ Rental</p>
                    <p class="text-xs text-brand-dark/60 leading-relaxed">Memulai bisnis rental mobil dengan komitmen memberikan pelayanan terbaik kepada pelanggan.</p>
                </div>
                <div class="bg-milestone rounded-xl p-4">
                    <p class="text-xs font-semibold text-brand mb-1">2025</p>
                    <p class="font-semibold text-brand-dark text-sm mb-1">Ekspansi Layanan</p>
                    <p class="text-xs text-brand-dark/60 leading-relaxed">Memperluas jangkauan layanan dengan menambah armada dan membuka cabang baru.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-cream text-center">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-xs uppercase tracking-[0.2em] text-brand font-semibold mb-2">Visi & Misi</p>
        <h2 class="font-serif text-3xl text-brand-dark mb-3">Yang Kami Tuju</h2>
        <p class="text-brand-dark/60 mb-12">Memberikan layanan rental mobil terbaik dengan mengutamakan kepuasan dan kenyamanan pelanggan.</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-10 text-left">
            <div>
                <p class="text-xs uppercase tracking-wide text-brand font-semibold mb-2">Visi</p>
                <h3 class="font-serif text-xl text-brand-dark mb-3">Menjadi Pilihan Utama</h3>
                <p class="text-sm text-brand-dark/60 leading-relaxed">Menjadi penyedia layanan rental mobil terpercaya dan terbaik di Indonesia dengan pelayanan yang profesional dan harga yang kompetitif.</p>
            </div>
            <div>
                <p class="text-xs uppercase tracking-wide text-brand font-semibold mb-2">Misi</p>
                <h3 class="font-serif text-xl text-brand-dark mb-3">Komitmen Kami</h3>
                <p class="text-sm text-brand-dark/60 leading-relaxed">Memberikan kenyamanan dan keamanan dalam setiap perjalanan dengan mobil yang terawat, harga transparan, dan pelayanan yang ramah.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p class="text-xs uppercase tracking-[0.2em] text-brand font-semibold mb-2">Keunggulan Kami</p>
        <h2 class="font-serif text-3xl text-brand-dark mb-12">Mengapa Memilih Kami</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 text-left">
            <div>
                <p class="font-serif text-2xl text-brand mb-2">01</p>
                <h3 class="font-semibold text-brand-dark mb-2">Keamanan Terjamin</h3>
                <p class="text-sm text-brand-dark/60">Mobil kami rutin diperiksa dan sopir berpengalaman untuk keamanan perjalanan Anda.</p>
            </div>
            <div>
                <p class="font-serif text-2xl text-brand mb-2">02</p>
                <h3 class="font-semibold text-brand-dark mb-2">Mobil Berkualitas</h3>
                <p class="text-sm text-brand-dark/60">Pilihan mobil yang terawat dengan baik dan selalu dalam kondisi prima.</p>
            </div>
            <div>
                <p class="font-serif text-2xl text-brand mb-2">03</p>
                <h3 class="font-semibold text-brand-dark mb-2">Harga Jelas</h3>
                <p class="text-sm text-brand-dark/60">Harga transparan tanpa biaya tersembunyi, semua sudah termasuk dalam paket sewa.</p>
            </div>
            <div>
                <p class="font-serif text-2xl text-brand mb-2">04</p>
                <h3 class="font-semibold text-brand-dark mb-2">Pelayanan Cepat</h3>
                <p class="text-sm text-brand-dark/60">Proses booking yang mudah dan respon cepat untuk kebutuhan Anda.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-cream">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-3xl bg-gradient-to-r from-[#2b2019] to-[#4a342a] p-8 sm:p-12 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
            <div>
                <p class="text-[11px] uppercase tracking-[0.2em] text-brand-light mb-2">Siap Melayani Anda</p>
                <h3 class="font-serif text-2xl sm:text-3xl text-white">Butuh Rental Mobil?</h3>
                <p class="mt-3 text-white/60 max-w-lg text-sm">Untuk kebutuhan perjalanan wisata, bisnis, atau keperluan lainnya, hubungi kami untuk informasi dan booking mobil.</p>
            </div>
            <div class="flex flex-col gap-3 shrink-0 w-full sm:w-auto">
                <a href="{{ route('booking') }}" class="px-6 py-3 rounded-full bg-brand text-white text-sm font-semibold text-center hover:bg-brand-light transition-colors">Booking Sekarang</a>
                <a href="{{ route('contact') }}" class="px-6 py-3 rounded-full border border-white/30 text-white text-sm font-semibold text-center hover:bg-white/10 transition-colors">Hubungi Kami</a>
            </div>
        </div>
    </div>
</section>

@endsection
