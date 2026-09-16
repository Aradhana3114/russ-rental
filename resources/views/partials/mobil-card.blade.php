@php
    $activeBooking = $mobil->activeBooking();
    $unitTersedia = $mobil->unit_tersedia;
@endphp
<div class="bg-white rounded-2xl overflow-hidden border border-brand/10 hover:shadow-xl hover:shadow-brand/10 transition-shadow group">
    <div class="aspect-[4/3] bg-cream overflow-hidden relative">
        <img src="{{ $mobil->gambar ? asset('storage/'.$mobil->gambar) : 'https://placehold.co/500x375?text='.urlencode($mobil->nama) }}"
             alt="{{ $mobil->nama }}"
             class="w-full h-full object-contain p-4 group-hover:scale-105 transition-transform duration-500">
        @if($unitTersedia <= 0)
            <span class="absolute top-3 left-3 bg-red-500 text-white text-[10px] font-semibold px-3 py-1 rounded-full shadow">
                Semua Unit Tersewa
            </span>
        @elseif($unitTersedia <= 2)
            <span class="absolute top-3 left-3 bg-amber-500 text-white text-[10px] font-semibold px-3 py-1 rounded-full shadow">
                Tersisa {{ $unitTersedia }} Unit
            </span>
        @endif
    </div>
    <div class="p-4">
        <div class="flex items-start justify-between gap-2">
            <h3 class="font-semibold text-brand-dark text-sm leading-snug">{{ $mobil->nama }}</h3>
            @if($mobil->rating)
                <span class="shrink-0 text-xs text-brand font-semibold">{{ number_format($mobil->rating, 1) }}</span>
            @endif
        </div>
        <p class="text-xs text-brand-dark/50 mt-1">{{ $mobil->tipe_kendaraan }} · {{ $mobil->kapasitas ?? '4' }} Kursi · {{ $mobil->transmisi ?? 'AT' }}</p>
        <p class="text-[11px] text-brand-dark/40 mt-1">🚗 {{ $mobil->stok }} unit armada · {{ $unitTersedia }} tersedia hari ini</p>

        <div class="flex items-center justify-between mt-4">
            <div>
                <p class="text-brand font-semibold">Rp {{ number_format($mobil->harga_per_hari, 0, ',', '.') }}</p>
                <p class="text-[10px] text-brand-dark/40">Biaya sewa harian (bersih)</p>
            </div>
            @if($unitTersedia <= 0)
                <span class="text-xs font-semibold bg-cream text-brand-dark/40 px-3 py-2 rounded-lg whitespace-nowrap cursor-not-allowed">
                    Tidak Tersedia
                </span>
            @else
                <a href="{{ route('booking') }}?mobil={{ $mobil->slug }}"
                   class="text-xs font-semibold bg-brand text-white px-3 py-2 rounded-lg hover:bg-brand-dark transition-colors whitespace-nowrap">
                    Sewa Sekarang
                </a>
            @endif
        </div>
    </div>
</div>
