@extends('layouts.app')

@section('title', 'Jelajahi Armada & Layanan Kami — Russ Rental')

@section('content')

<section class="bg-cream py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
            <div>
                <span class="text-[11px] uppercase tracking-wide bg-white text-brand px-3 py-1.5 rounded-full border border-brand/20">Daftar Mobil</span>
                <h1 class="font-serif text-4xl mt-5 text-brand-dark">Daftar Mobil & Layanan Kami</h1>
                <p class="text-brand font-medium mt-1">Armada Kemewahan & Layanan Mobilitas Eksklusif</p>
                <p class="mt-4 text-brand-dark/60 max-w-xl">Pilih dari armada kami yang terawat dengan cermat untuk layanan sopir eksekutif, lepas kunci, atau sewa korporat dengan pengantaran premium.</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-4 lg:justify-end">
                <div class="bg-white rounded-xl px-5 py-4 border border-brand/10">
                    <p class="text-sm font-semibold text-brand-dark">{{ $mobils->where('status', 'tersedia')->count() }} Tersedia Hari Ini</p>
                    <p class="text-xs text-brand-dark/40">Unit Siap Dipesan</p>
                </div>
                <div class="bg-white rounded-xl px-5 py-4 border border-brand/10">
                    <p class="text-sm font-semibold text-brand-dark">100% Tersterilisasi & Terinspeksi</p>
                    <p class="text-xs text-brand-dark/40">Higienis & Aman</p>
                </div>
            </div>
        </div>

        <div class="mt-8 bg-white rounded-2xl border border-brand/10 px-6 py-4 flex flex-col sm:flex-row gap-4 sm:gap-8 text-sm text-brand-dark/70">
            <p><span class="font-semibold text-brand-dark">Lepas Kunci</span> — Sewa Tanpa Supir, Pengantaran Vila & Asuransi</p>
            <p><span class="font-semibold text-brand-dark">Armada Korporat</span> — Sewa Bulanan & Tahunan Fleksibel</p>
        </div>

        <!-- Filter bar -->
        <form method="GET" action="{{ route('services') }}" class="mt-8 bg-white rounded-2xl border border-brand/10 p-4 flex flex-col lg:flex-row lg:items-center gap-4">
            <div class="flex flex-wrap gap-2">
                <button type="submit" name="kategori" value=""
                        class="px-4 py-2 rounded-full text-sm font-medium {{ !request('kategori') ? 'bg-brand text-white' : 'bg-cream text-brand-dark/70' }}">
                    Semua Armada ({{ $mobils->count() }})
                </button>
                @foreach($kategoriList as $kategori => $jumlah)
                    <button type="submit" name="kategori" value="{{ $kategori }}"
                            class="px-4 py-2 rounded-full text-sm font-medium {{ request('kategori') === $kategori ? 'bg-brand text-white' : 'bg-cream text-brand-dark/70' }}">
                        {{ $kategori }} ({{ $jumlah }})
                    </button>
                @endforeach
            </div>
            <div class="flex-1 flex gap-3 lg:justify-end">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari armada..."
                       class="w-full sm:w-64 rounded-xl border border-brand/20 px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-brand/40">
                <button type="submit" class="shrink-0 px-4 py-2 rounded-xl bg-cream text-sm font-medium text-brand-dark/70 border border-brand/10">Cari</button>
            </div>
        </form>

        <!-- Grid -->
        <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($mobils as $mobil)
                @include('partials.mobil-card', ['mobil' => $mobil])
            @empty
                <p class="col-span-full text-center text-brand-dark/50 py-16">Belum ada armada pada tipe ini.</p>
            @endforelse
        </div>

        <div class="mt-10">
            {{ $mobils->links() }}
        </div>
    </div>
</section>

@endsection
