@extends('layouts.app')

@section('title', 'Kebijakan Privasi — Russ Rental')

@section('content')

<section class="bg-cream py-14">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-xs text-brand-dark/40 mb-4"><a href="{{ route('home') }}" class="hover:text-brand">Beranda</a> <span class="mx-1">/</span> Kebijakan Privasi</p>
        <h1 class="font-serif text-4xl text-brand-dark">Kebijakan Privasi</h1>
        <p class="mt-4 text-brand-dark/60 max-w-2xl">Terakhir diperbarui: 17 September 2026</p>
    </div>
</section>

<section class="py-14 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 prose prose-brand max-w-none">

        <h2 class="font-serif text-2xl text-brand-dark">1. Pengumpulan Informasi</h2>
        <p class="text-brand-dark/70 leading-relaxed">Kami mengumpulkan informasi pribadi yang Anda berikan secara langsung saat menggunakan layanan kami, termasuk namun tidak terbatas pada nama lengkap, alamat email, nomor telepon/WhatsApp, alamat penjemputan, serta informasi dokumen identitas yang diperlukan untuk proses rental.</p>

        <h2 class="font-serif text-2xl text-brand-dark mt-8">2. Penggunaan Informasi</h2>
        <p class="text-brand-dark/70 leading-relaxed">Informasi yang kami kumpulkan digunakan untuk:</p>
        <ul class="text-brand-dark/70 leading-relaxed list-disc pl-5 mt-2 space-y-1">
            <li>Memproses pemesanan dan konfirmasi rental mobil Anda</li>
            <li> Menghubungi Anda terkait status pemesanan melalui WhatsApp atau telepon</li>
            <li>Meningkatkan kualitas layanan dan pengalaman pelanggan</li>
            <li>Menyampaikan informasi promosi atau penawaran khusus (dengan persetujuan Anda)</li>
        </ul>

        <h2 class="font-serif text-2xl text-brand-dark mt-8">3. Perlindungan Data</h2>
        <p class="text-brand-dark/70 leading-relaxed">Kami berkomitmen melindungi data pribadi Anda. Kami menerapkan langkah-langkah keamanan teknis dan organisasi yang sesuai untuk mencegah akses, penggunaan, atau pengungkapan data pribadi Anda yang tidak sah.</p>

        <h2 class="font-serif text-2xl text-brand-dark mt-8">4. Berbagi Informasi</h2>
        <p class="text-brand-dark/70 leading-relaxed">Kami tidak menjual, menyewakan, atau membagikan informasi pribadi Anda kepada pihak ketiga tanpa persetujuan Anda, kecuali diwajibkan oleh hukum atau untuk keperluan pemrosesan layanan (misalnya: koordinasi dengan sopir untuk penjemputan).</p>

        <h2 class="font-serif text-2xl text-brand-dark mt-8">5. Penyimpanan Data</h2>
        <p class="text-brand-dark/70 leading-relaxed">Data pribadi Anda disimpan selama diperlukan untuk tujuan pengumpulan data sebagaimana dijelaskan dalam kebijakan ini, atau sebagaimana diwajibkan oleh ketentuan perundang-undangan yang berlaku.</p>

        <h2 class="font-serif text-2xl text-brand-dark mt-8">6. Hak Anda</h2>
        <p class="text-brand-dark/70 leading-relaxed">Anda berhak untuk mengakses, memperbarui, atau meminta penghapusan data pribadi Anda kapan saja dengan menghubungi kami melalui WhatsApp atau email yang tersedia di halaman Kontak.</p>

        <h2 class="font-serif text-2xl text-brand-dark mt-8">7. Cookie</h2>
        <p class="text-brand-dark/70 leading-relaxed">Situs kami dapat menggunakan cookie untuk meningkatkan pengalaman menjelajah Anda. Anda dapat mengatur preferensi cookie melalui pengaturan browser Anda.</p>

        <h2 class="font-serif text-2xl text-brand-dark mt-8">8. Perubahan Kebijakan</h2>
        <p class="text-brand-dark/70 leading-relaxed">Kami dapat memperbarui kebijakan privasi ini dari waktu ke waktu. Perubahan akan dipublikasikan di halaman ini dengan tanggal pembaruan yang tertera di atas.</p>

        <h2 class="font-serif text-2xl text-brand-dark mt-8">9. Hubungi Kami</h2>
        <p class="text-brand-dark/70 leading-relaxed">Jika Anda memiliki pertanyaan terkait kebijakan privasi ini, silakan hubungi kami melalui WhatsApp di <a href="https://wa.me/6285186669860" class="text-brand font-semibold hover:underline">+62 851-8666-9860</a> atau email ke <a href="mailto:info@russrental.com" class="text-brand font-semibold hover:underline">info@russrental.com</a>.</p>

    </div>
</section>

@endsection
