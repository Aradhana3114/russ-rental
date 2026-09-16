# Russ Rental — Company Profile & Booking Website (Rental Mobil)

Website company profile untuk **Russ Rental**, jasa penyewaan mobil premium, dibangun dengan **Laravel 11 + Filament 5** sesuai tema *Rental Mobil* pada tugas UJIKOM (Kelompok 4 — Automotive & Transportation).

- **Nama Perusahaan:** Russ Rental
- **Logo:** `public/images/logo.png` (ikon tanduk rusa / antler)
- **WhatsApp Konsierge:** +62 851-8666-9860
- **Palet Warna:** Primary `#90603A` · Dark Brown `#533728` · Cream `#FBF3EC` (70% cream / 20% primary / 10% dark)
- **Font:** Playfair Display (heading) + Inter (body)

Tampilan blade dibuat **1:1 mengikuti desain Figma** yang diberikan (Home, Services/Fleet, Portfolio/Gallery, Team, Contact).

---

## 📁 Struktur Folder Lengkap

Struktur ini sudah memenuhi kebutuhan requirement UJIKOM: halaman Home, About Us, Services/Products, Portfolio/Gallery, Team, Contact, Footer, responsive design, navigasi antar halaman, form kontak, logo & identitas perusahaan, serta CRUD dengan input gambar (via Filament Admin Panel).

```
russ-rental-mobil/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── PageController.php        # controller semua halaman publik
│   │       └── ContactController.php     # handle simpan form kontak
│   ├── Models/
│   │   ├── Mobil.php                     # CRUD utama: data armada mobil
│   │   ├── TeamMember.php                # data tim/karyawan
│   │   ├── PortfolioItem.php             # data portfolio/gallery
│   │   ├── Testimoni.php                 # data testimoni klien
│   │   └── ContactMessage.php            # pesan masuk dari form kontak
│   └── Filament/
│       └── Resources/                    # ADMIN PANEL (CRUD + upload gambar)
│           ├── MobilResource.php
│           │   └── Pages/ (List/Create/Edit)
│           ├── TeamMemberResource.php
│           │   └── Pages/ (List/Create/Edit)
│           ├── PortfolioItemResource.php
│           │   └── Pages/ (List/Create/Edit)
│           ├── TestimoniResource.php
│           │   └── Pages/ (List/Create/Edit)
│           └── ContactMessageResource.php
│               └── Pages/ (List/Edit)
│
├── database/
│   ├── migrations/
│   │   ├── 2024_01_01_000001_create_mobils_table.php
│   │   ├── 2024_01_01_000002_create_team_members_table.php
│   │   ├── 2024_01_01_000003_create_portfolio_items_table.php
│   │   ├── 2024_01_01_000004_create_testimonis_table.php
│   │   └── 2024_01_01_000005_create_contact_messages_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── MobilSeeder.php                # 8 unit mobil contoh
│       ├── TeamMemberSeeder.php           # 5 anggota tim
│       ├── PortfolioItemSeeder.php        # 4 galeri portfolio
│       └── TestimoniSeeder.php            # 3 testimoni klien
│
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   └── app.blade.php             # layout master (navbar, footer, WA button)
│   │   ├── partials/
│   │   │   ├── navbar.blade.php          # navigasi + logo Russ Rental
│   │   │   ├── footer.blade.php          # footer lengkap
│   │   │   └── mobil-card.blade.php      # komponen kartu mobil (reusable)
│   │   └── pages/
│   │       ├── home.blade.php            # Home: hero, hallmark, fleet, CTA
│   │       ├── about.blade.php           # About Us: profil, visi/misi, 4 pilar
│   │       ├── services.blade.php        # Services: fleet grid + filter kategori
│   │       ├── portfolio.blade.php       # Portfolio/Gallery + testimoni
│   │       ├── team.blade.php            # Team: struktur tim & chauffeur guild
│   │       └── contact.blade.php         # Contact: form + info + FAQ
│   ├── css/
│   │   └── app.css                       # Tailwind + font config
│   └── js/
│       └── app.js                        # Alpine.js (navbar mobile, FAQ accordion)
│
├── routes/
│   └── web.php                           # named routes semua halaman publik
│
├── public/
│   └── images/
│       └── logo.png                      # logo antler Russ Rental (dari upload)
│
├── composer.json                         # dependency Laravel 11 + Filament 5
├── package.json                          # dependency Tailwind + Alpine + Vite
├── vite.config.js
├── postcss.config.js
├── tailwind.config.js                    # warna brand & font custom
├── .env.example                          # konfigurasi environment
└── README.md
```

> **Catatan:** folder `vendor/`, `node_modules/`, file inti Laravel (`bootstrap/`, `config/`, `public/index.php`, `artisan`, dst) **tidak disertakan** karena harus digenerate oleh Composer/Laravel installer di komputer Anda sendiri (lingkungan pembuatan file ini tidak memiliki akses internet). Ikuti langkah instalasi di bawah — semua file di atas tinggal ditimpa/disalin ke project Laravel baru.

---

## 🚀 Cara Instalasi

### 1. Buat project Laravel baru
```bash
composer create-project laravel/laravel russ-rental-mobil
cd russ-rental-mobil
```

### 2. Install Filament 5
```bash
composer require filament/filament
php artisan filament:install --panels
```

### 3. Install Tailwind, Alpine, Vite
```bash
npm install
npm install -D tailwindcss postcss autoprefixer
npm install alpinejs @alpinejs/collapse
```

### 4. Salin seluruh file dari paket ini
Salin folder `app/`, `database/`, `resources/`, `routes/`, `public/images/`, serta file `tailwind.config.js`, `vite.config.js`, `postcss.config.js` ke dalam project Laravel Anda (timpa file yang sudah ada bila diminta).

### 5. Konfigurasi `.env`
```bash
cp .env.example .env
php artisan key:generate
```
Sesuaikan `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` dengan MySQL Anda.

### 6. Migrasi & Seeder
```bash
php artisan migrate --seed
php artisan storage:link
```

### 7. Buat akun admin Filament
```bash
php artisan make:filament-user
```

### 8. Jalankan
```bash
npm run dev        # compile Tailwind/Alpine (terminal terpisah)
php artisan serve  # jalankan server Laravel
```

- Website publik: `http://localhost:8000`
- Admin panel (CRUD): `http://localhost:8000/admin`

---

## ✅ Checklist Fitur (sesuai requirement UJIKOM)

| Fitur | Status | Keterangan |
|---|---|---|
| Home | ✅ | Hero, hallmark, fleet unggulan, CTA |
| About Us | ✅ | Profil, sejarah, visi, misi, 4 pilar keunggulan |
| Services / Products | ✅ | Grid armada + filter kategori + search |
| Portfolio / Gallery | ✅ | Galeri showcase + filter + testimoni |
| Team | ✅ | Struktur tim + chauffeur guild |
| Contact | ✅ | Alamat, telepon, email, WhatsApp, Google Maps, form kontak |
| Footer | ✅ | Di semua halaman via layout |
| Responsive design | ✅ | Tailwind (mobile, tablet, desktop) |
| Navigasi antar halaman | ✅ | Navbar + named routes |
| Form kontak | ✅ | Validasi server-side + pesan sukses |
| Logo & identitas perusahaan | ✅ | Logo antler + nama Russ Rental di navbar/footer |
| CRUD dengan input gambar | ✅ | Filament: Mobil, Tim, Portfolio (FileUpload + imageEditor) |
| Authentication (admin) | ✅ | Bawaan Filament (`make:filament-user`) |
| Dashboard admin | ✅ | Panel Filament di `/admin` |
| Validation | ✅ | Laravel Validator di `ContactController` |

---

## 📞 Kontak Konsierge
- **WhatsApp:** [+62 851-8666-9860](https://wa.me/6285186669860)
- **Email:** concierge@russrental.com
