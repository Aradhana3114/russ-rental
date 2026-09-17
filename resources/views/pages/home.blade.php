@extends('layouts.app')

@section('title', 'Russ Rental — Pengalaman Berkendara & Mobilitas Premium')
@section('htmlClass', 'bg-transparent')
@section('bodyClass', 'bg-[#1a1210]')

@section('content')

<!-- HERO -->
<section class="relative -mt-20 pt-20 pb-16 flex items-center" style="min-height: calc(90vh + 5rem);">
    <!-- Foto background hero — extend ke atas menutupi area navbar -->
    <div class="absolute -top-20 left-0 right-0 bottom-0 overflow-hidden">
        <img src="{{ asset('images/hero.jpg') }}"
             alt="Russ Rental — Mobil Berkualitas"
             class="w-full h-full object-cover object-center">
        <!-- Overlay gelap supaya teks tetap terbaca -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/50 to-black/70"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">

        <div class="relative z-10 max-w-2xl">
            <div class="flex flex-wrap gap-2 mb-6">
                <span class="text-[11px] tracking-wide uppercase bg-white/10 text-white/80 px-3 py-1.5 rounded-full backdrop-blur-sm">Rental Mobil Terpercaya</span>
            </div>

            <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl leading-tight text-white mb-2">
                Rental Mobil Berkualitas
            </h1>
            <p class="font-serif text-2xl sm:text-3xl lg:text-4xl italic text-brand-light">
                dengan Harga Terjangkau
            </p>

            <p class="mt-6 text-white/80 text-base sm:text-lg max-w-xl leading-relaxed">
                Pilihan mobil berkualitas dengan proses booking yang mudah di Jakarta, Bali, dan sekitarnya.
            </p>

            <div class="mt-8 flex flex-wrap gap-3">
                <a href="{{ route('booking') }}" class="px-7 py-3.5 rounded-full bg-brand text-white text-sm font-semibold hover:bg-brand-light transition-colors shadow-lg">
                    Booking Sekarang
                </a>
                <a href="{{ route('services') }}" class="px-7 py-3.5 rounded-full border-2 border-white/40 text-white text-sm font-semibold hover:bg-white/10 transition-colors backdrop-blur-sm">
                    Lihat Daftar Mobil →
                </a>
            </div>

            <div class="mt-12 grid grid-cols-2 gap-6 text-white/80 text-sm">
                <div>
                    <p class="text-white font-semibold text-lg">Antar Jemput</p>
                    <p class="text-white/60 text-sm mt-1">Layanan Antar Jemput</p>
                </div>
                <div>
                    <p class="text-white font-semibold text-lg">{{ $unitCount }}+ Unit</p>
                    <p class="text-white/60 text-sm mt-1">Mobil Siap Pakai</p>
                </div>
            </div>
        </div>

    </div>


</section>

<!-- HALLMARK -->
<section class="py-16 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p class="text-xs uppercase tracking-[0.2em] text-brand font-semibold mb-3">Keunggulan Kami</p>
        <h2 class="font-serif text-3xl sm:text-4xl text-brand-dark">Layanan Rental Mobil Terpercaya</h2>
        <p class="mt-4 text-brand-dark/60 max-w-2xl mx-auto">
            Kami menyediakan layanan rental mobil dengan standar kualitas terbaik untuk kenyamanan perjalanan Anda.
        </p>

        <div class="mt-14 grid grid-cols-1 sm:grid-cols-2 gap-10 text-left">
            <div>
                <div class="w-11 h-11 rounded-full bg-cream flex items-center justify-center mb-4 text-brand text-lg font-bold">01</div>
                <h3 class="font-semibold text-brand-dark mb-2">Mobil Terawat & Bersih</h3>
                <p class="text-sm text-brand-dark/60 leading-relaxed">Semua mobil kami rutin diservis dan dibersihkan secara menyeluruh sebelum diserahkan kepada pelanggan untuk memastikan kenyamanan Anda.</p>
                <a href="{{ route('services') }}" class="inline-block mt-3 text-brand text-sm font-semibold">Lihat Daftar Mobil →</a>
            </div>
            <div>
                <div class="w-11 h-11 rounded-full bg-cream flex items-center justify-center mb-4 text-brand text-lg font-bold">02</div>
                <h3 class="font-semibold text-brand-dark mb-2">Booking Mudah & Cepat</h3>
                <p class="text-sm text-brand-dark/60 leading-relaxed">Proses pemesanan yang simple dan harga yang jelas tanpa biaya tersembunyi. Kami siap membantu kebutuhan rental Anda kapan saja.</p>
                <a href="{{ route('booking') }}" class="inline-block mt-3 text-brand text-sm font-semibold">Booking Sekarang →</a>
            </div>
        </div>
    </div>
</section>

<!-- FLEET SELECTION -->
<section class="py-16 bg-cream">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-end justify-between mb-10">
            <div>
                <p class="text-xs uppercase tracking-[0.2em] text-brand font-semibold mb-2">Pilihan Mobil</p>
                <h2 class="font-serif text-3xl text-brand-dark">Mobil Terpopuler</h2>
            </div>
            <a href="{{ route('services') }}" class="text-sm font-semibold text-brand hidden sm:inline-block">Lihat Semua {{ $unitCount }} Mobil →</a>
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
                <p class="text-[11px] uppercase tracking-[0.2em] text-brand-light mb-2">Siap Melayani Anda</p>
                <h3 class="font-serif text-2xl sm:text-3xl text-white max-w-xl">Butuh Mobil? Hubungi Kami Sekarang</h3>
                <p class="mt-3 text-white/60 max-w-lg text-sm">Proses booking yang mudah, harga transparan, dan mobil berkualitas siap untuk Anda.</p>
            </div>
            <div class="flex flex-col gap-3 shrink-0 w-full sm:w-auto">
                <a href="{{ route('booking') }}" class="px-6 py-3 rounded-full bg-brand text-white text-sm font-semibold text-center hover:bg-brand-light transition-colors">Booking Sekarang</a>
                <a href="https://wa.me/6285186669860?text={{ urlencode('Halo, saya tertarik untuk rental mobil di Russ Rental. Mohon info lebih lanjut ya. Terima kasih.') }}" target="_blank" class="px-6 py-3 rounded-full border border-white/30 text-white text-sm font-semibold text-center hover:bg-white/10 transition-colors">Hubungi Kami</a>
            </div>
        </div>
    </div>
</section>

@endsection
