@extends('layouts.app')

@section('title', 'Booking — Russ Rental')

@section('content')

<section class="bg-cream py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-[11px] uppercase tracking-wide bg-white text-brand px-3 py-1.5 rounded-full border border-brand/20">Booking Armada</span>
        <h1 class="font-serif text-4xl mt-5 text-brand-dark">Ajukan Booking Mobil</h1>
        <p class="mt-4 text-brand-dark/60 max-w-2xl mx-auto">Pilih mobil, tentukan tanggal sewa, dan lengkapi data Anda. Tim Russ Rental akan menghubungi Anda melalui WhatsApp untuk konfirmasi ketersediaan dan detail pembayaran.</p>
    </div>
</section>

<section class="py-14 bg-white">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

        @if(session('success'))
            <div class="mb-6 rounded-xl bg-brand/10 border border-brand/20 text-brand-dark text-sm px-4 py-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-cream rounded-2xl border border-brand/10 p-6 sm:p-8">
            <form method="POST" action="{{ route('booking.store') }}" class="space-y-5" x-data="bookingForm()">
                @csrf

                <div>
                    <label class="text-sm font-medium text-brand-dark">Pilih Mobil</label>
                    <select name="mobil_id" x-model="selectedId" @change="updatePreview()"
                            class="mt-1 w-full rounded-xl border border-brand/20 px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand/40 bg-white">
                        <option value="">-- Pilih armada --</option>
                        @foreach($mobils as $mobil)
                            <option value="{{ $mobil->id }}"
                                data-nama="{{ $mobil->nama }}"
                                data-harga="{{ number_format($mobil->harga_per_hari, 0, ',', '.') }}"
                                data-gambar="{{ $mobil->gambar ? asset('storage/'.$mobil->gambar) : '' }}"
                                data-placeholder="https://placehold.co/600x400?text={{ urlencode($mobil->nama) }}"
                                {{ (old('mobil_id') == $mobil->id) || (!old('mobil_id') && $selectedMobil && $selectedMobil->id === $mobil->id) ? 'selected' : '' }}>
                                {{ $mobil->nama }} — Rp {{ number_format($mobil->harga_per_hari, 0, ',', '.') }}/hari
                            </option>
                        @endforeach
                    </select>
                    @error('mobil_id') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div x-show="previewGambar" x-transition class="rounded-xl overflow-hidden border border-brand/10 bg-white">
                    <img :src="previewGambar" :alt="previewNama" class="w-full h-56 sm:h-64 object-cover">
                    <div class="px-4 py-3 flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-brand-dark" x-text="previewNama"></p>
                            <p class="text-xs text-brand-dark/60">Kapasitas penumpang & fitur terbaik di kelasnya</p>
                        </div>
                        <p class="text-sm font-bold text-brand" x-text="previewHarga"></p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="text-sm font-medium text-brand-dark">Nama Lengkap</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Nama sesuai KTP"
                               class="mt-1 w-full rounded-xl border border-brand/20 px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand/40 bg-white">
                        @error('nama') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="text-sm font-medium text-brand-dark">Nomor WhatsApp</label>
                        <input type="text" name="whatsapp" value="{{ old('whatsapp') }}" placeholder="+62 812 0000 0000"
                               class="mt-1 w-full rounded-xl border border-brand/20 px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand/40 bg-white">
                        @error('whatsapp') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="text-sm font-medium text-brand-dark">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}"
                               class="mt-1 w-full rounded-xl border border-brand/20 px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand/40 bg-white">
                        @error('tanggal_mulai') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="text-sm font-medium text-brand-dark">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}"
                               class="mt-1 w-full rounded-xl border border-brand/20 px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand/40 bg-white">
                        @error('tanggal_selesai') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="text-sm font-medium text-brand-dark">Catatan (opsional)</label>
                    <textarea name="catatan" rows="4" placeholder="Lokasi penjemputan, kebutuhan supir, atau permintaan khusus lainnya..."
                              class="mt-1 w-full rounded-xl border border-brand/20 px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand/40 bg-white">{{ old('catatan') }}</textarea>
                    @error('catatan') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="w-full px-6 py-3 rounded-xl bg-brand text-white text-sm font-semibold hover:bg-brand-dark transition-colors">
                    Ajukan Booking →
                </button>
            </form>
        </div>

        <div class="mt-8 bg-cream rounded-2xl border border-brand/10 p-6 text-center">
            <h2 class="font-serif text-lg text-brand-dark mb-3">Butuh Bantuan Cepat?</h2>
            <p class="text-sm text-brand-dark/60 mb-5">Tim concierge kami siap membantu Anda memilih armada yang sesuai kebutuhan perjalanan.</p>
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <a :href="waUrl" target="_blank"
                   class="inline-flex justify-center items-center px-6 py-3 rounded-xl bg-brand text-white text-sm font-semibold hover:bg-brand-dark">
                    Chat via WhatsApp
                </a>
                <a href="{{ route('services') }}"
                   class="inline-flex justify-center items-center px-6 py-3 rounded-xl border border-brand/20 text-sm font-semibold text-brand-dark hover:bg-white">
                    Lihat Daftar Mobil
                </a>
            </div>
        </div>
    </div>
</section>

<script>
function bookingForm() {
    return {
        selectedId: '{{ old("mobil_id", $selectedMobil ? $selectedMobil->id : "") }}',
        previewGambar: '',
        previewNama: '',
        previewHarga: '',
        get waUrl() {
            const nama = this.previewNama || 'mobil'
            const tgl = document.querySelector('input[name="tanggal_mulai"]')?.value || 'tanggal yang diinginkan'
            const pesan = `Halo Kak, Saya tertarik untuk rental mobil ${nama}.\n\nApakah mobilnya masih tersedia untuk tanggal ${tgl}?\nMohon info harga dan ketentuan sewanya ya. Terima kasih.`
            return 'https://wa.me/6285186669860?text=' + encodeURIComponent(pesan)
        },
        init() {
            this.$nextTick(() => this.updatePreview())
        },
        updatePreview() {
            const select = this.$el.querySelector('select[name="mobil_id"]')
            const option = select.options[select.selectedIndex]
            if (this.selectedId && option.value) {
                this.previewGambar = option.dataset.gambar || option.dataset.placeholder
                this.previewNama = option.dataset.nama || ''
                this.previewHarga = 'Rp ' + (option.dataset.harga || '') + '/hari'
            } else {
                this.previewGambar = ''
                this.previewNama = ''
                this.previewHarga = ''
            }
        }
    }
}
</script>

@endsection
