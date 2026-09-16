@extends('layouts.app')

@section('title', 'Russ Rental — Pengalaman Berkendara & Mobilitas Premium')
@section('htmlClass', 'bg-transparent')
@section('bodyClass', 'bg-[#1a1210]')

@section('content')

<!-- HERO -->
<section class="relative -mt-20 pt-20 pb-16 flex items-center" style="min-height: calc(85vh + 5rem);">
    <!-- Foto background hero — extend ke atas menutupi area navbar -->
    <div class="absolute -top-20 left-0 right-0 bottom-0 overflow-hidden">
        <img src="{{ asset('images/hero.jpg') }}"
             alt="Russ Rental — Armada Premium"
             class="w-full h-full object-cover object-top">
        <!-- Overlay gelap supaya teks tetap terbaca -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/60 to-black/40"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="relative z-10">
            <div class="flex flex-wrap gap-2 mb-6">
                <span class="text-[11px] tracking-wide uppercase bg-white/10 text-white/80 px-3 py-1.5 rounded-full">Armada VIP Nusantara</span>
            </div>

            <h1 class="font-serif text-4xl sm:text-5xl leading-tight text-white">
                Pengalaman Berkendara &amp; Mobilitas Premium
                <span class="block italic text-brand-light">bersama Russ Rental</span>
            </h1>

            <p class="mt-5 text-white/70 max-w-lg leading-relaxed">
                Armada luxury car terkurasi, booking mulus tanpa hambatan di Jakarta, Bali, dan sekitarnya.
            </p>

            <div class="mt-8 flex flex-wrap gap-3">
                <a href="{{ route('booking') }}" class="px-6 py-3 rounded-full bg-brand text-white text-sm font-semibold hover:bg-brand-light transition-colors">
                    Booking Armada Anda
                </a>
                <a href="{{ route('services') }}" class="px-6 py-3 rounded-full border border-white/30 text-white text-sm font-semibold hover:bg-white/10 transition-colors">
                    Lihat Showroom →
                </a>
            </div>

            <div class="mt-10 grid grid-cols-2 gap-4 text-white/80 text-xs">
                <div>
                    <p class="text-white font-semibold">Tarmac</p>
                    <p class="text-white/50">Akses VIP Bandara</p>
                </div>
                <div>
                    <p class="text-white font-semibold">50+ Unit</p>
                    <p class="text-white/50">Armada Prima Siap Jalan</p>
                </div>
            </div>
        </div>

    </div>


</section>

<!-- HALLMARK -->
<section class="py-16 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p class="text-xs uppercase tracking-[0.2em] text-brand font-semibold mb-3">Ciri Khas Russ</p>
        <h2 class="font-serif text-3xl sm:text-4xl text-brand-dark">Medefinisi Ulang Perjalanan Mewah di Seluruh Nusantara</h2>
        <p class="mt-4 text-brand-dark/60 max-w-2xl mx-auto">
            Standar keramahan Swiss berpadu dengan kenyamanan grand touring berkelas untuk setiap perjalanan eksekutif Anda.
        </p>

        <div class="mt-14 grid grid-cols-1 sm:grid-cols-2 gap-10 text-left">
            <div>
                <div class="w-11 h-11 rounded-full bg-cream flex items-center justify-center mb-4 text-brand text-lg font-bold">01</div>
                <h3 class="font-semibold text-brand-dark mb-2">Armada Prima & Tersterilisasi</h3>
                <p class="text-sm text-brand-dark/60 leading-relaxed">Setiap armada melalui inspeksi mekanik 50 titik yang ketat, sterilisasi ozon standar medis, serta detailing kabin menyeluruh sebelum diantar ke hadapan Anda.</p>
                <a href="{{ route('services') }}" class="inline-block mt-3 text-brand text-sm font-semibold">Standar 50-Point Russ →</a>
            </div>
            <div>
                <div class="w-11 h-11 rounded-full bg-cream flex items-center justify-center mb-4 text-brand text-lg font-bold">02</div>
                <h3 class="font-semibold text-brand-dark mb-2">Konfirmasi Instan & Pemesanan Mudah</h3>
                <p class="text-sm text-brand-dark/60 leading-relaxed">Pemesanan tanpa friksi administrasi, transparansi harga penuh, dan penagihan korporat instan. Atur penjemputan bandara VIP hingga blok armada korporat secara seamless.</p>
                <a href="{{ route('booking') }}" class="inline-block mt-3 text-brand text-sm font-semibold">Booking Cepat & Mudah →</a>
            </div>
        </div>
    </div>
</section>

<!-- FLEET SELECTION -->
<section class="py-16 bg-cream">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-end justify-between mb-10">
            <div>
                <p class="text-xs uppercase tracking-[0.2em] text-brand font-semibold mb-2">Showroom Pilihan</p>
                <h2 class="font-serif text-3xl text-brand-dark">Pilihan Armada Eksklusif</h2>
            </div>
            <a href="{{ route('services') }}" class="text-sm font-semibold text-brand hidden sm:inline-block">Lihat Semua {{ $mobils->count() }} Armada →</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($mobils->take(4) as $mobil)
                @include('partials.mobil-card', ['mobil' => $mobil])
            @endforeach
        </div>
    </div>
</section>

<!-- CTA BANNER -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-3xl bg-gradient-to-r from-[#2b2019] to-[#4a342a] p-8 sm:p-12 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
            <div>
                <p class="text-[11px] uppercase tracking-[0.2em] text-brand-light mb-2">Hak Istimewa Grand Touring</p>
                <h3 class="font-serif text-2xl sm:text-3xl text-white max-w-xl">Tingkatkan Kualitas Perjalanan Anda — Booking Sekarang</h3>
                <p class="mt-3 text-white/60 max-w-lg text-sm">Nikmati mobilitas kelas satu tanpa kompromi. Pemesanan cepat, transparansi harga penuh, dan armada prima siap jalan.</p>
            </div>
            <div class="flex flex-col gap-3 shrink-0 w-full sm:w-auto">
                <a href="{{ route('booking') }}" class="px-6 py-3 rounded-full bg-brand text-white text-sm font-semibold text-center hover:bg-brand-light transition-colors">Booking Now</a>
                <a href="https://wa.me/6285186669860?text={{ urlencode('Halo Kak, Saya tertarik untuk rental mobil di Russ Rental. Mohon info lebih lanjut ya. Terima kasih.') }}" target="_blank" class="px-6 py-3 rounded-full border border-white/30 text-white text-sm font-semibold text-center hover:bg-white/10 transition-colors">Hubungi Kami</a>
            </div>
        </div>
    </div>
</section>

@endsection
