@extends('layouts.app')

@section('title', 'Ketentuan Sewa — Russ Rental')

@section('content')

<section class="bg-cream py-14">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-xs text-brand-dark/40 mb-4"><a href="{{ route('home') }}" class="hover:text-brand">Beranda</a> <span class="mx-1">/</span> Ketentuan Sewa</p>
        <h1 class="font-serif text-4xl text-brand-dark">Ketentuan Sewa</h1>
        <p class="mt-4 text-brand-dark/60 max-w-2xl">Terakhir diperbarui: 17 September 2026</p>
    </div>
</section>

<section class="py-14 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 prose prose-brand max-w-none">

        <h2 class="font-serif text-2xl text-brand-dark">1. Pemesanan</h2>
        <p class="text-brand-dark/70 leading-relaxed">Pemesanan dapat dilakukan melalui form booking di situs kami atau langsung melalui WhatsApp. Pemesanan dianggap sah setelah Anda menerima konfirmasi dari tim kami.</p>

        <h2 class="font-serif text-2xl text-brand-dark mt-8">2. Pembayaran</h2>
        <p class="text-brand-dark/70 leading-relaxed">Pembayaran dilakukan sesuai dengan kesepakatan yang dikonfirmasi oleh tim kami. Kami menerima pembayaran melalui transfer bank dan tunai. Bukti pembayaran harus dikirimkan via WhatsApp untuk konfirmasi.</p>

        <h2 class="font-serif text-2xl text-brand-dark mt-8">3. Deposit Jaminan</h2>
        <p class="text-brand-dark/70 leading-relaxed">Deposit jaminan diperlukan untuk beberapa kategori kendaraan. Deposit akan dikembalikan penuh setelah kendaraan dikembalikan dalam kondisi baik sesuai saat penerimaan.</p>

        <h2 class="font-serif text-2xl text-brand-dark mt-8">4. Pembatalan</h2>
        <p class="text-brand-dark/70 leading-relaxed">Pembatalan yang dilakukan minimal 24 jam sebelum jadwal sewa tidak dikenakan biaya. Pembatalan yang dilakukan kurang dari 24 jam sebelum jadwal sewa dapat dikenakan biaya pembatalan.</p>

        <h2 class="font-serif text-2xl text-brand-dark mt-8">5. Penggunaan Kendaraan</h2>
        <p class="text-brand-dark/70 leading-relaxed">Kendaraan hanya boleh digunakan untuk keperluan yang sah dan sesuai dengan hukum yang berlaku. Penyewa bertanggung jawab penuh atas kendaraan selama masa sewa berlangsung.</p>

        <h2 class="font-serif text-2xl text-brand-dark mt-8">6. Pengembalian Kendaraan</h2>
        <p class="text-brand-dark/70 leading-relaxed">Kendaraan harus dikembalikan sesuai dengan tanggal dan waktu yang telah disepakati. Keterlambatan pengembalian dapat dikenakan biaya tambahan per jam atau per hari.</p>

        <h2 class="font-serif text-2xl text-brand-dark mt-8">7. Kerusakan dan Kehilangan</h2>
        <p class="text-brand-dark/70 leading-relaxed">Penyewa bertanggung jawab atas kerusakan atau kehilangan kendaraan selama masa sewa. Biaya perbaikan atau penggantian akan dibebankan kepada penyewa sesuai dengan kondisi kerusakan.</p>

        <h2 class="font-serif text-2xl text-brand-dark mt-8">8. Asuransi</h2>
        <p class="text-brand-dark/70 leading-relaxed">Setiap kendaraan kami dilengkapi dengan asuransi dasar. Untuk perlindungan tambahan, silakan lihat halaman <a href="{{ route('insurance') }}" class="text-brand font-semibold hover:underline">Asuransi</a> kami.</p>

        <h2 class="font-serif text-2xl text-brand-dark mt-8">9. Ketentuan Lainnya</h2>
        <p class="text-brand-dark/70 leading-relaxed">Ketentuan sewa ini dapat berubah sewaktu-waktu tanpa pemberitahuan sebelumnya. Silakan hubungi kami jika Anda memiliki pertanyaan terkait ketentuan sewa ini.</p>

    </div>
</section>

@endsection
