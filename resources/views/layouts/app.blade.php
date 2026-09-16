<!DOCTYPE html>
<html lang="id" class="@yield('htmlClass')">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Russ Rental — Mobilitas Premium')</title>
    <meta name="description" content="@yield('description', 'Russ Rental — layanan sewa mobil premium dengan armada eksklusif, sopir profesional, dan konsierge 24/7 di Jakarta & Bali.')">

    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,600&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="@yield('bodyClass', 'bg-cream') text-brand-dark font-sans antialiased">

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/6285186669860?text={{ urlencode('Halo Kak, Saya tertarik untuk rental mobil di Russ Rental. Mohon info lebih lanjut ya. Terima kasih.') }}"
       target="_blank"
       class="fixed bottom-6 right-6 z-50 flex items-center gap-2 bg-brand text-white px-4 py-3 rounded-full shadow-lg shadow-brand/30 hover:bg-brand-dark transition-colors">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
            <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.46 1.32 4.96L2 22l5.25-1.38a9.9 9.9 0 0 0 4.79 1.22h.01c5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.87 9.87 0 0 0 12.04 2Zm5.8 14.1c-.24.68-1.4 1.3-1.93 1.38-.5.08-1.11.11-1.79-.11-.41-.13-.94-.31-1.62-.6-2.85-1.23-4.71-4.1-4.85-4.29-.14-.19-1.16-1.54-1.16-2.94 0-1.4.73-2.08.99-2.37.26-.28.58-.35.77-.35h.55c.18 0 .42-.03.65.5.24.55.81 1.9.88 2.04.07.14.12.31.02.5-.1.19-.15.31-.29.48-.14.16-.3.36-.43.49-.14.14-.29.29-.13.57.17.28.75 1.24 1.61 2 1.11.99 2.04 1.3 2.32 1.44.28.14.44.12.6-.07.17-.19.71-.83.9-1.11.19-.28.38-.24.64-.14.26.09 1.66.78 1.94.92.28.14.47.21.53.33.07.12.07.68-.17 1.36Z"/>
        </svg>
        <span class="hidden sm:inline text-sm font-semibold">WhatsApp</span>
    </a>

    @stack('scripts')
</body>
</html>
