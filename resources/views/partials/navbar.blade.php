<header x-data="{ open: false, scrolled: false }" x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })" class="sticky top-0 z-40 transition-all duration-300" :class="scrolled ? 'bg-white/80 backdrop-blur-3xl shadow-lg shadow-black/5 border-b border-brand/10' : 'bg-black/20 backdrop-blur-3xl border-b border-white/10'">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">

            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-2 shrink-0">
                <img src="{{ asset('images/logo.png') }}" alt="Russ Rental" class="w-9 h-9 object-contain">
                <div class="leading-tight">
                    <span class="block font-serif text-xl font-semibold tracking-wide" :class="scrolled ? 'text-brand-dark' : 'text-white'">Russ Rental</span>
                    <span class="block text-[10px] tracking-[0.2em] uppercase" :class="scrolled ? 'text-brand/70' : 'text-white/70'">Mobilitas Premium</span>
                </div>
            </a>

            <!-- Desktop Nav -->
            <nav class="hidden lg:flex items-center gap-8 text-sm font-medium" :class="scrolled ? 'text-brand-dark/80' : 'text-white/80'">
                @php
                    $navLinks = [
                        'home'     => ['label' => 'Beranda',      'route' => 'home'],
                        'about'    => ['label' => 'Tentang Kami', 'route' => 'about'],
                        'services' => ['label' => 'Daftar Mobil','route' => 'services'],
                        'booking'  => ['label' => 'Booking',   'route' => 'booking'],
                        'team'     => ['label' => 'Tim',         'route' => 'team'],
                        'contact'  => ['label' => 'Kontak',      'route' => 'contact'],
                    ];
                @endphp
                @foreach ($navLinks as $key => $link)
                    <a href="{{ route($link['route']) }}"
                       class="relative pb-1 transition-colors"
                       :class="scrolled ? '{{ request()->routeIs($link["route"]) ? "text-brand font-semibold" : "hover:text-brand" }}' : '{{ request()->routeIs($link["route"]) ? "text-brand-light font-semibold" : "hover:text-white" }}'">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </nav>

            <!-- CTA -->
            <div class="hidden lg:flex items-center gap-3">
                <a href="{{ route('booking') }}"
                   class="inline-flex items-center px-5 py-2.5 rounded-full bg-brand text-white text-sm font-semibold tracking-wide hover:bg-brand-dark transition-colors shadow-sm shadow-brand/30">
                    Booking Now
                </a>
            </div>

            <!-- Mobile toggle -->
            <button @click="open = !open" class="lg:hidden p-2" :class="scrolled ? 'text-brand-dark' : 'text-white'">
                <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Nav -->
    <div x-show="open" x-cloak x-transition class="lg:hidden border-t border-brand/10 bg-white/90 backdrop-blur-3xl">
        <nav class="flex flex-col px-4 py-4 gap-1 text-sm font-medium text-brand-dark/80">
            <a href="{{ route('home') }}" class="py-2 {{ request()->routeIs('home') ? 'text-brand font-semibold' : '' }}">Beranda</a>
            <a href="{{ route('about') }}" class="py-2 {{ request()->routeIs('about') ? 'text-brand font-semibold' : '' }}">Tentang Kami</a>
            <a href="{{ route('services') }}" class="py-2 {{ request()->routeIs('services') ? 'text-brand font-semibold' : '' }}">Daftar Mobil</a>
            <a href="{{ route('booking') }}" class="py-2 {{ request()->routeIs('booking') ? 'text-brand font-semibold' : '' }}">Booking</a>
            <a href="{{ route('team') }}" class="py-2 {{ request()->routeIs('team') ? 'text-brand font-semibold' : '' }}">Tim</a>
            <a href="{{ route('contact') }}" class="py-2 {{ request()->routeIs('contact') ? 'text-brand font-semibold' : '' }}">Kontak</a>
            <a href="{{ route('booking') }}" class="mt-3 inline-flex justify-center items-center px-5 py-2.5 rounded-full bg-brand text-white text-sm font-semibold">
                Booking Now
            </a>
        </nav>
    </div>
</header>
