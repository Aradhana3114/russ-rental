@extends('layouts.app')

@section('title', 'Kontak — Russ Rental')

@section('content')

<section class="bg-cream py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <span class="text-[11px] uppercase tracking-wide bg-white text-brand px-3 py-1.5 rounded-full border border-brand/20">Layanan Pelanggan</span>
        <h1 class="font-serif text-4xl mt-5 text-brand-dark">Hubungi Russ Rental</h1>
        <p class="mt-4 text-brand-dark/60 max-w-2xl">Punya pertanyaan atau butuh bantuan? Silakan hubungi kami. Tim kami siap membantu Anda. Untuk pemesanan mobil, silakan kunjungi halaman <a href="{{ route('booking') }}" class="text-brand font-semibold hover:underline">Booking</a>.</p>

        <div class="mt-10 grid grid-cols-1 sm:grid-cols-3 gap-8 border-t border-brand/10 pt-8">
            <div>
                <p class="text-xs uppercase text-brand-dark/40 mb-1">Kantor</p>
                <p class="font-semibold text-brand-dark">Jakarta</p>
                <p class="text-sm text-brand-dark/60 mt-1">Gedung SCBD, Jl. Jend. Sudirman, Jakarta Selatan</p>
            </div>
            <div>
                <p class="text-xs uppercase text-brand-dark/40 mb-1">WhatsApp</p>
                <p class="font-semibold text-brand-dark">Hubungi Kami</p>
                <p class="text-sm text-brand-dark/60 mt-1">
                    <a href="https://wa.me/6285186669860?text={{ urlencode('Halo, saya tertarik untuk rental mobil di Russ Rental. Mohon info lebih lanjut ya. Terima kasih.') }}" target="_blank" class="hover:text-brand">+62 851-8666-9860</a>
                </p>
            </div>
            <div>
                <p class="text-xs uppercase text-brand-dark/40 mb-1">Email</p>
                <p class="font-semibold text-brand-dark">Kirim Pesan</p>
                <p class="text-sm text-brand-dark/60 mt-1">info@russrental.com</p>
            </div>
        </div>
    </div>
</section>

<section class="py-14 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-10">

        <div>
            <p class="text-xs uppercase tracking-[0.2em] text-brand font-semibold mb-2">Kirim Pesan</p>
            <h2 class="font-serif text-2xl text-brand-dark mb-2">Sampaikan Pesan Anda</h2>
            <p class="text-sm text-brand-dark/60 mb-6">Kami senang mendengar dari Anda. Sampaikan pertanyaan, saran, atau pesan lainnya melalui formulir di bawah ini.</p>

            @if(session('success'))
                <div class="mb-6 rounded-xl bg-brand/10 border border-brand/20 text-brand-dark text-sm px-4 py-3">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="text-sm font-medium text-brand-dark">Nama Lengkap</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Nama Anda"
                               class="mt-1 w-full rounded-xl border border-brand/20 px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand/40">
                        @error('nama') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="text-sm font-medium text-brand-dark">Nomor Telepon / WhatsApp</label>
                        <input type="text" name="telepon" value="{{ old('telepon') }}" placeholder="+62 812 0000 0000"
                               class="mt-1 w-full rounded-xl border border-brand/20 px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand/40">
                        @error('telepon') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="text-sm font-medium text-brand-dark">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com"
                               class="mt-1 w-full rounded-xl border border-brand/20 px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand/40">
                        @error('email') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="text-sm font-medium text-brand-dark">Kategori Pesan</label>
                        <select name="layanan" class="mt-1 w-full rounded-xl border border-brand/20 px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand/40">
                            <option value="saran">Saran</option>
                            <option value="kritik">Kritik</option>
                            <option value="pertanyaan">Pertanyaan</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="text-sm font-medium text-brand-dark">Pesan Anda</label>
                    <textarea name="pesan" rows="4" placeholder="Tulis pesan Anda di sini..."
                              class="mt-1 w-full rounded-xl border border-brand/20 px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand/40">{{ old('pesan') }}</textarea>
                    @error('pesan') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="flex items-center gap-4 flex-wrap">
                    <button type="submit" class="px-6 py-3 rounded-full bg-brand text-white text-sm font-semibold hover:bg-brand-dark transition-colors">
                        Kirim Pesan →
                    </button>
                    <span class="text-xs text-brand-dark/40">Kami akan merespon dalam waktu 1x24 jam</span>
                </div>
            </form>
        </div>

        <div>
            <p class="text-xs uppercase tracking-[0.2em] text-brand font-semibold mb-2">Lokasi Kantor</p>
            <div class="flex items-center justify-between mb-4">
                <h2 class="font-serif text-2xl text-brand-dark">Jakarta & Bali</h2>
                <span class="text-[11px] bg-cream text-brand-dark/60 px-3 py-1 rounded-full">2 Lokasi</span>
            </div>

            <div class="rounded-2xl overflow-hidden border border-brand/10 h-72">
                <iframe
                    src="https://www.google.com/maps?q=SCBD+Sudirman+Jakarta&output=embed"
                    class="w-full h-full" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <div class="flex gap-3 mt-4">
                <a href="https://maps.google.com/?q=SCBD+Sudirman+Jakarta" target="_blank"
                   class="flex-1 text-center px-4 py-3 rounded-xl border border-brand/20 text-sm font-semibold text-brand-dark hover:bg-cream">Lihat di Peta</a>
                <a href="https://wa.me/6285186669860?text={{ urlencode('Halo, saya tertarik untuk rental mobil di Russ Rental. Mohon info lebih lanjut ya. Terima kasih.') }}" target="_blank"
                   class="flex-1 text-center px-4 py-3 rounded-xl bg-brand text-white text-sm font-semibold hover:bg-brand-dark">Hubungi Kami</a>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-cream">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p class="text-xs uppercase tracking-[0.2em] text-brand font-semibold mb-2">Informasi Penting</p>
        <p class="text-xs text-brand-dark/40 uppercase mb-2">Pertanyaan yang Sering Diajukan</p>
        <h2 class="font-serif text-3xl text-brand-dark mb-3">Pertanyaan Umum</h2>
        <p class="text-brand-dark/60 mb-10">Beberapa informasi penting seputar ketentuan sewa, deposit, dan layanan yang kami sediakan.</p>

        <div x-data="{ open: 1 }" class="space-y-3 text-left">
            <div class="bg-white rounded-xl border border-brand/10 px-6 py-4">
                <button @click="open = (open === 1 ? null : 1)" class="w-full flex items-center justify-between">
                    <span class="text-sm font-semibold text-brand-dark"><span class="text-brand mr-2">01</span>Bagaimana ketentuan deposit untuk rental mobil?</span>
                    <span x-text="open === 1 ? '˄' : '˅'" class="text-brand-dark/40"></span>
                </button>
                <p x-show="open === 1" x-collapse class="text-sm text-brand-dark/60 mt-3">Deposit disesuaikan dengan jenis mobil dan akan dikembalikan setelah mobil diperiksa dan dinyatakan dalam kondisi baik.</p>
            </div>
            <div class="bg-white rounded-xl border border-brand/10 px-6 py-4">
                <button @click="open = (open === 2 ? null : 2)" class="w-full flex items-center justify-between">
                    <span class="text-sm font-semibold text-brand-dark"><span class="text-brand mr-2">02</span>Apakah tersedia layanan antar jemput mobil?</span>
                    <span x-text="open === 2 ? '˄' : '˅'" class="text-brand-dark/40"></span>
                </button>
                <p x-show="open === 2" x-collapse class="text-sm text-brand-dark/60 mt-3">Ya, kami menyediakan layanan antar jemput mobil ke lokasi yang Anda tentukan untuk kenyamanan Anda.</p>
            </div>
            <div class="bg-white rounded-xl border border-brand/10 px-6 py-4">
                <button @click="open = (open === 3 ? null : 3)" class="w-full flex items-center justify-between">
                    <span class="text-sm font-semibold text-brand-dark"><span class="text-brand mr-2">03</span>Dokumen apa saja yang diperlukan untuk rental mobil?</span>
                    <span x-text="open === 3 ? '˄' : '˅'" class="text-brand-dark/40"></span>
                </button>
                <p x-show="open === 3" x-collapse class="text-sm text-brand-dark/60 mt-3">KTP/Identitas yang masih berlaku dan SIM yang sesuai dengan jenis kendaraan yang akan disewa.</p>
            </div>
        </div>
    </div>
</section>

@endsection
