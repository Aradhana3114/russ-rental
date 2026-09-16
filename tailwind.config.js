/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./app/Filament/**/*.php",
    ],
    theme: {
        extend: {
            colors: {
                brand: {
                    DEFAULT: '#90603A', // brown utama (primary), tombol & aksen — sample presisi dari Figma
                    light: '#B98756',
                    dark: '#3A2A1D',    // dark brown (secondary) untuk hero/CTA — sample presisi dari Figma
                },
                cream: '#FFF8F6',       // background utama — sample presisi dari Figma
                banner: '#D2B7A6',      // solid tan banner (About Us hero)
                milestone: '#FBEAE3',   // bg card milestone/stat pink pucat
            },
            fontFamily: {
                sans: ['Inter', 'ui-sans-serif', 'system-ui'],
                serif: ['"Playfair Display"', 'ui-serif', 'Georgia'],
            },
        },
    },
    plugins: [],
}
