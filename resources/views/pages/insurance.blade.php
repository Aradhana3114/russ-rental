@extends('layouts.app')

@section('title', 'Asuransi — Russ Rental')

@section('content')

<section class="bg-cream py-14">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-xs text-brand-dark/40 mb-4"><a href="{{ route('home') }}" class="hover:text-brand">Beranda</a> <span class="mx-1">/</span> Asuransi</p>
        <h1 class="font-serif text-4xl text-brand-dark">Asuransi</h1>
        <p class="mt-4 text-brand-dark/60 max-w-2xl">Perlindungan kendaraan untuk ketenangan Anda selama perjalanan.</p>
    </div>
</section>

<section class="py-14 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <div>
                <h2 class="font-serif text-2xl text-brand-dark mb-4">Asuransi Dasar</h2>
                <p class="text-brand-dark/70 leading-relaxed mb-4">Setiap kendaraan yang disewakan melalui Russ Rental sudah dilengkapi dengan asuransi dasar yang mencakup:</p>
                <ul class="text-brand-dark/70 leading-relaxed list-disc pl-5 space-y-2">
                    <li>Perlindungan terhadap kerusakan akibat kecelakaan lalu lintas</li>
                    <li>Pertanggungjawaban pihak ketiga (Third Party Liability)</li>
                    <li>Biaya perbaikan darurat di jalan (roadside assistance)</li>
                    <li>Santunan untuk penumpang</li>
                </ul>
                <p class="text-brand-dark/70 leading-relaxed mt-4">Asuransi dasar ini sudah termasuk dalam harga sewa tanpa biaya tambahan.</p>
            </div>

            <div>
                <h2 class="font-serif text-2xl text-brand-dark mb-4">Asuransi Premium</h2>
                <p class="text-brand-dark/70 leading-relaxed mb-4">Untuk perlindungan yang lebih lengkap, kami menyediakan paket asuransi premium dengan manfaat tambahan:</p>
                <ul class="text-brand-dark/70 leading-relaxed list-disc pl-5 space-y-2">
                    <li>Pengurangan risiko tanggung jawab (Zero Excess)</li>
                    <li>Perlindungan terhadap pencurian kendaraan</li>
                    <li>Perlindungan terhadap kerusakan akibat bencana alam</li>
                    <li>Penggantian kendaraan cadangan jika kendaraan mengalami kerusakan berat</li>
                    <li>Layanan derek 24 jam tanpa biaya tambahan</li>
                </ul>
                <div class="mt-6 bg-cream rounded-xl p-5 border border-brand/10">
                    <p class="font-semibold text-brand-dark">Mulai dari Rp 75.000/hari</p>
                    <p class="text-sm text-brand-dark/60 mt-1">Tersedia untuk semua kategori kendaraan</p>
                </div>
            </div>
        </div>

        <div class="mt-12 bg-cream rounded-2xl p-8 border border-brand/10">
            <h2 class="font-serif text-2xl text-brand-dark mb-4">Ketentuan Klaim Asuransi</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <p class="font-semibold text-brand-dark mb-2">Langkah Klaim:</p>
                    <ol class="text-sm text-brand-dark/70 leading-relaxed list-decimal pl-5 space-y-1">
                        <li>Hubungi tim kami segera setelah kejadian</li>
                        <li>Buat laporan polisi (jika diperlukan)</li>
                        <li>Dokumentasikan kondisi kendaraan dengan foto</li>
                        <li>Kirimkan dokumen yang diperlukan via WhatsApp</li>
                    </ol>
                </div>
                <div>
                    <p class="font-semibold text-brand-dark mb-2">Dokumen yang Diperlukan:</p>
                    <ul class="text-sm text-brand-dark/70 leading-relaxed list-disc pl-5 space-y-1">
                        <li>Foto kondisi kendaraan pasca kejadian</li>
                        <li>Laporan polisi (untuk kasus kecelakaan)</li>
                        <li>Bukti identitas penyewa</li>
                        <li>Perjanjian sewa (booking confirmation)</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="mt-10 text-center">
            <p class="text-brand-dark/60 mb-4">Butuh informasi lebih lanjut tentang asuransi?</p>
            <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 rounded-full bg-brand text-white text-sm font-semibold hover:bg-brand-dark transition-colors">Hubungi Kami</a>
        </div>

    </div>
</section>

@endsection
