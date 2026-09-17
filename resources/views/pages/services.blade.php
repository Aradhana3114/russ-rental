@extends('layouts.app')

@section('title', 'Jelajahi Armada & Layanan Kami — Russ Rental')

@section('content')

<section class="bg-cream py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
            <div>
                <span class="text-[11px] uppercase tracking-wide bg-white text-brand px-3 py-1.5 rounded-full border border-brand/20">Daftar Mobil</span>
                <h1 class="font-serif text-4xl mt-5 text-brand-dark">Pilihan Mobil Rental Kami</h1>
                <p class="text-brand font-medium mt-1">Berbagai Pilihan Mobil Berkualitas</p>
                <p class="mt-4 text-brand-dark/60 max-w-xl">Pilih mobil sesuai kebutuhan Anda, tersedia dengan sopir atau lepas kunci untuk perjalanan yang nyaman.</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-4 lg:justify-end">
                <div class="bg-white rounded-xl px-5 py-4 border border-brand/10">
                    <p class="text-sm font-semibold text-brand-dark">{{ $tersediaHariIni }} Tersedia Hari Ini</p>
                    <p class="text-xs text-brand-dark/40">Siap Dipesan</p>
                </div>
                <div class="bg-white rounded-xl px-5 py-4 border border-brand/10">
                    <p class="text-sm font-semibold text-brand-dark">Terawat & Bersih</p>
                    <p class="text-xs text-brand-dark/40">Kondisi Prima</p>
                </div>
            </div>
        </div>

        <div class="mt-8 bg-white rounded-2xl border border-brand/10 px-6 py-4 flex flex-col sm:flex-row gap-4 sm:gap-8 text-sm text-brand-dark/70">
            <p><span class="font-semibold text-brand-dark">Lepas Kunci</span> — Sewa mobil tanpa sopir dengan antar jemput</p>
            <p><span class="font-semibold text-brand-dark">Rental Korporat</span> — Paket sewa bulanan dan tahunan</p>
        </div>

        <!-- Filter bar -->
        <form method="GET" action="{{ route('services') }}" class="mt-8 bg-white rounded-2xl border border-brand/10 p-4 flex flex-col lg:flex-row lg:items-center gap-4">
            <div class="flex flex-wrap gap-2">
                <button type="submit" name="kategori" value=""
                        class="px-4 py-2 rounded-full text-sm font-medium {{ !request('kategori') ? 'bg-brand text-white' : 'bg-cream text-brand-dark/70' }}">
                    Semua Mobil ({{ $mobils->count() }})
                </button>
                @foreach($kategoriList as $kategori => $jumlah)
                    <button type="submit" name="kategori" value="{{ $kategori }}"
                            class="px-4 py-2 rounded-full text-sm font-medium {{ request('kategori') === $kategori ? 'bg-brand text-white' : 'bg-cream text-brand-dark/70' }}">
                        {{ $kategori }} ({{ $jumlah }})
                    </button>
                @endforeach
            </div>
            <div class="flex-1 flex gap-3 lg:justify-end">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari mobil..."
                       class="w-full sm:w-64 rounded-xl border border-brand/20 px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-brand/40">
                <button type="submit" class="shrink-0 px-4 py-2 rounded-xl bg-cream text-sm font-medium text-brand-dark/70 border border-brand/10">Cari</button>
            </div>
        </form>

        <!-- Grid -->
        <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($mobils as $mobil)
                @include('partials.mobil-card', ['mobil' => $mobil])
            @empty
                <p class="col-span-full text-center text-brand-dark/50 py-16">Belum ada mobil untuk kategori ini.</p>
            @endforelse
        </div>

        @if($mobils->hasPages())
        <div class="mt-10 flex flex-col sm:flex-row items-center justify-between gap-4">
            <!-- Info Halaman -->
            <div class="text-sm text-brand-dark/60">
                Halaman <span class="font-semibold text-brand-dark">{{ $mobils->currentPage() }}</span> 
                dari <span class="font-semibold text-brand-dark">{{ $mobils->lastPage() }}</span>
            </div>

            <!-- Pagination Buttons -->
            <div class="flex items-center gap-2">
                @if ($mobils->onFirstPage())
                    <span class="px-4 py-2 rounded-lg bg-cream text-brand-dark/40 text-sm font-medium cursor-not-allowed">« Previous</span>
                @else
                    <a href="{{ $mobils->previousPageUrl() }}" class="px-4 py-2 rounded-lg bg-white border border-brand/20 text-brand-dark text-sm font-medium hover:bg-cream transition-colors">« Previous</a>
                @endif

                @if ($mobils->hasMorePages())
                    <a href="{{ $mobils->nextPageUrl() }}" class="px-4 py-2 rounded-lg bg-brand text-white text-sm font-medium hover:bg-brand-dark transition-colors">Next »</a>
                @else
                    <span class="px-4 py-2 rounded-lg bg-cream text-brand-dark/40 text-sm font-medium cursor-not-allowed">Next »</span>
                @endif
            </div>
        </div>
        @endif
    </div>
</section>

@endsection
