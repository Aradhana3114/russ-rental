<footer class="bg-cream border-t border-brand/10 pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">

            <div>
                <a href="{{ route('home') }}" class="flex items-center gap-2 mb-3">
                    <img src="{{ asset('images/logo.png') }}" alt="Russ Rental" class="w-8 h-8 object-contain">
                    <span class="font-serif text-lg font-semibold text-brand-dark">Russ Rental</span>
                </a>
                <p class="text-sm text-brand-dark/60 leading-relaxed">
                    Layanan rental otomotif konsierge terkurasi dan bespoke touring experience untuk pelanggan istimewa di seluruh Indonesia.
                </p>
                <p class="mt-3 inline-flex items-center gap-1 text-xs font-medium text-brand">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                    Standar Grand Touring
                </p>
            </div>

            <div>
                <h4 class="font-semibold text-brand-dark mb-4">Layanan Konsierge</h4>
                <ul class="space-y-2 text-sm text-brand-dark/60">
                    <li><a href="{{ route('services') }}" class="hover:text-brand">Katalog Armada</a></li>
                    <li><a href="{{ route('services') }}" class="hover:text-brand">Sewa Armada Korporat</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-brand">Syarat & Ketentuan Khusus</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-semibold text-brand-dark mb-4">Pusat Mobilitas</h4>
                <ul class="space-y-2 text-sm text-brand-dark/60">
                    <li>Jakarta: SCBD Tower One, Lantai 18, Sudirman Central Business District</li>
                    <li>Bali: Jl. Kayu Aya, Seminyak Luxury Pavilion Hub</li>
                </ul>
            </div>

            <div>
                <h4 class="font-semibold text-brand-dark mb-4">Meja Konsierge Pribadi</h4>
                <ul class="space-y-2 text-sm text-brand-dark/60">
                    <li>
                        <a href="https://wa.me/6285186669860" target="_blank" class="hover:text-brand">WhatsApp: +62 851-8666-9860</a>
                    </li>
                    <li>concierge@russrental.com</li>
                </ul>
                <div class="flex gap-3 mt-4 text-brand-dark/60">
                    <a href="#" class="hover:text-brand">IG</a>
                    <a href="#" class="hover:text-brand">TikTok</a>
                    <a href="#" class="hover:text-brand">YT</a>
                </div>
            </div>
        </div>

        <div class="mt-12 pt-6 border-t border-brand/10 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-brand-dark/50">
            <p>&copy; {{ date('Y') }} Russ Rental. Hak cipta dilindungi.</p>
            <div class="flex gap-5">
                <a href="#" class="hover:text-brand">Kebijakan Privasi</a>
                <a href="#" class="hover:text-brand">Sewa Khusus</a>
                <a href="#" class="hover:text-brand">Perlindungan Asuransi</a>
            </div>
        </div>
    </div>
</footer>
