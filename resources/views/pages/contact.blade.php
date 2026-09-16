@extends('layouts.app')

@section('title', 'Kontak — Russ Rental')

@section('content')

<section class="bg-cream py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <span class="text-[11px] uppercase tracking-wide bg-white text-brand px-3 py-1.5 rounded-full border border-brand/20">Layanan Klien Eksekutif · Liaison Pribadi</span>
        <h1 class="font-serif text-4xl mt-5 text-brand-dark">Hubungi Konsierge Russ Rental</h1>
        <p class="mt-4 text-brand-dark/60 max-w-2xl">Punya pertanyaan, saran, atau kritik seputar layanan Russ Rental? Sampaikan kepada kami — masukan Anda membantu kami terus meningkatkan kualitas layanan. Untuk pemesanan mobil, silakan kunjungi halaman <a href="{{ route('booking') }}" class="text-brand font-semibold hover:underline">Booking</a>.</p>

        <div class="mt-10 grid grid-cols-1 sm:grid-cols-3 gap-8 border-t border-brand/10 pt-8">
            <div>
                <p class="text-xs uppercase text-brand-dark/40 mb-1">Kantor Pusat</p>
                <p class="font-semibold text-brand-dark">Kantor Jakarta SCBD</p>
                <p class="text-sm text-brand-dark/60 mt-1">Gedung SCBD Tower Satu, Lantai 18, Jl. Jend. Sudirman</p>
            </div>
            <div>
                <p class="text-xs uppercase text-brand-dark/40 mb-1">Saluran Siaga</p>
                <p class="font-semibold text-brand-dark">Meja Dispatc 24/7</p>
                <p class="text-sm text-brand-dark/60 mt-1">
                    <a href="https://wa.me/6285186669860?text={{ urlencode('Halo Kak, Saya tertarik untuk rental mobil di Russ Rental. Mohon info lebih lanjut ya. Terima kasih.') }}" target="_blank" class="hover:text-brand">+62 851-8666-9860 (WhatsApp)</a>
                </p>
            </div>
            <div>
                <p class="text-xs uppercase text-brand-dark/40 mb-1">Layanan Daring</p>
                <p class="font-semibold text-brand-dark">Korporat & Pertanyaan</p>
                <p class="text-sm text-brand-dark/60 mt-1">concierge@russrental.com</p>
            </div>
        </div>
    </div>
</section>

<section class="py-14 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-10">

        <div>
            <p class="text-xs uppercase tracking-[0.2em] text-brand font-semibold mb-2">Saran & Kritik</p>
            <h2 class="font-serif text-2xl text-brand-dark mb-2">Sampaikan Saran atau Kritik Anda</h2>
            <p class="text-sm text-brand-dark/60 mb-6">Pengalaman Anda penting bagi kami. Sampaikan saran, kritik, maupun pertanyaan umum seputar layanan Russ Rental melalui formulir di bawah ini.</p>

            @if(session('success'))
                <div class="mb-6 rounded-xl bg-brand/10 border border-brand/20 text-brand-dark text-sm px-4 py-3">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="text-sm font-medium text-brand-dark">Nama Lengkap Sesuai KTP / Paspor</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Contoh: Alistair Sterling / Raden Bagus"
                               class="mt-1 w-full rounded-xl border border-brand/20 px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand/40">
                        @error('nama') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="text-sm font-medium text-brand-dark">Nomor Telepon / WhatsApp Aktif</label>
                        <input type="text" name="telepon" value="{{ old('telepon') }}" placeholder="+62 812 0000 0000"
                               class="mt-1 w-full rounded-xl border border-brand/20 px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand/40">
                        @error('telepon') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="text-sm font-medium text-brand-dark">Alamat Email Resmi</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@perusahaan.co.id"
                               class="mt-1 w-full rounded-xl border border-brand/20 px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand/40">
                        @error('email') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="text-sm font-medium text-brand-dark">Kategori Pesan</label>
                        <select name="layanan" class="mt-1 w-full rounded-xl border border-brand/20 px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand/40">
                            <option value="saran">Saran</option>
                            <option value="kritik">Kritik</option>
                            <option value="pertanyaan">Pertanyaan Umum</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="text-sm font-medium text-brand-dark">Saran atau Kritik Anda</label>
                    <textarea name="pesan" rows="4" placeholder="Tuliskan saran, kritik, atau pertanyaan Anda seputar layanan Russ Rental..."
                              class="mt-1 w-full rounded-xl border border-brand/20 px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand/40">{{ old('pesan') }}</textarea>
                    @error('pesan') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="flex items-center gap-4 flex-wrap">
                    <button type="submit" class="px-6 py-3 rounded-full bg-brand text-white text-sm font-semibold hover:bg-brand-dark transition-colors">
                        Kirim Saran/Kritik →
                    </button>
                    <span class="text-xs text-brand-dark/40">Respon resmi dalam 15 menit pada jam operasional</span>
                </div>
            </form>
        </div>

        <div>
            <p class="text-xs uppercase tracking-[0.2em] text-brand font-semibold mb-2">Pusat Strategis</p>
            <div class="flex items-center justify-between mb-4">
                <h2 class="font-serif text-2xl text-brand-dark">SCBD Jakarta & Pusat Bali</h2>
                <span class="text-[11px] bg-cream text-brand-dark/60 px-3 py-1 rounded-full">2 Lokasi Utama</span>
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
                   class="flex-1 text-center px-4 py-3 rounded-xl border border-brand/20 text-sm font-semibold text-brand-dark hover:bg-cream">Google Maps</a>
                <a href="https://wa.me/6285186669860?text={{ urlencode('Halo Kak, Saya tertarik untuk rental mobil di Russ Rental. Mohon info lebih lanjut ya. Terima kasih.') }}" target="_blank"
                   class="flex-1 text-center px-4 py-3 rounded-xl bg-brand text-white text-sm font-semibold hover:bg-brand-dark">Hubungi Dispatc</a>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-cream">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p class="text-xs uppercase tracking-[0.2em] text-brand font-semibold mb-2">Standar Konsierge Russ Rental</p>
        <p class="text-xs text-brand-dark/40 uppercase mb-2">Basis Pengetahuan Klien</p>
        <h2 class="font-serif text-3xl text-brand-dark mb-3">Pertanyaan Umum Terkait Protokol</h2>
        <p class="text-brand-dark/60 mb-10">Jawaban lengkap dan terperinci terkait ketentuan sewa, jaminan deposit, hingga protokol penjemputan curbside dan terminal VIP.</p>

        <div x-data="{ open: 1 }" class="space-y-3 text-left">
            <div class="bg-white rounded-xl border border-brand/10 px-6 py-4">
                <button @click="open = (open === 1 ? null : 1)" class="w-full flex items-center justify-between">
                    <span class="text-sm font-semibold text-brand-dark"><span class="text-brand mr-2">01</span>Bagaimana kebijakan dan ketentuan deposit jaminan keamanan?</span>
                    <span x-text="open === 1 ? '˄' : '˅'" class="text-brand-dark/40"></span>
                </button>
                <p x-show="open === 1" x-collapse class="text-sm text-brand-dark/60 mt-3">Deposit jaminan disesuaikan dengan kategori kendaraan dan dikembalikan penuh maksimal 3 hari kerja setelah unit diperiksa dan dinyatakan sesuai kondisi awal.</p>
            </div>
            <div class="bg-white rounded-xl border border-brand/10 px-6 py-4">
                <button @click="open = (open === 2 ? null : 2)" class="w-full flex items-center justify-between">
                    <span class="text-sm font-semibold text-brand-dark"><span class="text-brand mr-2">02</span>Bagaimana alur layanan sambutan VIP di bandara (meet-and-greet)?</span>
                    <span x-text="open === 2 ? '˄' : '˅'" class="text-brand-dark/40"></span>
                </button>
                <p x-show="open === 2" x-collapse class="text-sm text-brand-dark/60 mt-3">Sopir akan menyambut Anda di area kedatangan dengan papan nama, membantu bagasi, dan memantau jadwal penerbangan secara real-time tanpa biaya tambahan.</p>
            </div>
            <div class="bg-white rounded-xl border border-brand/10 px-6 py-4">
                <button @click="open = (open === 3 ? null : 3)" class="w-full flex items-center justify-between">
                    <span class="text-sm font-semibold text-brand-dark"><span class="text-brand mr-2">03</span>Dokumen apa saja yang diperlukan bagi tamu internasional?</span>
                    <span x-text="open === 3 ? '˄' : '˅'" class="text-brand-dark/40"></span>
                </button>
                <p x-show="open === 3" x-collapse class="text-sm text-brand-dark/60 mt-3">Paspor yang berlaku, SIM Internasional (untuk layanan lepas kunci), serta konfirmasi jadwal penerbangan untuk keperluan penjemputan.</p>
            </div>
        </div>
    </div>
</section>

@endsection
