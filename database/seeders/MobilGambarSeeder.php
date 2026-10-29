<?php

namespace Database\Seeders;

use App\Models\Mobil;
use Illuminate\Database\Seeder;

/**
 * Mengisi kolom `gambar` pada mobil dari file yang ada di storage/app/public.
 *
 * Seeder ini idempotent: hanya menyentuh baris yang `gambar`-nya masih kosong,
 * dan hanya menulis nama file yang benar-benar ada di disk. Karena itu aman
 * dijalankan berulang (termasik pada setiap boot container) tanpa menimpa
 * gambar yang sudah diunggah lewat panel admin.
 */
class MobilGambarSeeder extends Seeder
{
    /**
     * nama mobil => path relatif terhadap storage/app/public
     *
     * @var array<string, string>
     */
    protected array $gambar = [
        'Toyota Alphard Executive'      => 'mobils/01M2EXJPBC1MZT6AM1H9YKPT52.webp',
        'Land Rover Defender 110'       => 'mobils/01M2PR7RFCR7H3EYJ5X4JV9ZPH.webp',
        'Porsche Taycan 4S'             => 'mobils/01M2PRA8ARWYZH7JGE73XHMGYS.png',
        'Toyota Innova Zenix Q'         => 'mobils/01M2QG27FMEQJ97F52JJV1ZCXZ.png',
        'Toyota Vellfire Comfort'       => 'mobils/01M2PRTW7SJRK88Z09SQ2ZGVFX.jpg',
        'Hyundai Staria Premium'        => 'mobils/01M2PRX785KZR6Q1YB55QXMCF7.webp',
        'BMW X7 xDrive40i'              => 'mobils/01M2PRZ2XVBQ107P0JNK6M5QJ7.jpg',
        'Mercedes-Benz GLE 450'         => 'mobils/01M2PS3XTQCDZQC0P4AZESEEBR.webp',
        'Toyota Fortuner VRZ'           => 'mobils/01M2PS6JZK6AMT1H8MVQ77F8MM.webp',
        'Mitsubishi Pajero Sport Dakar' => 'mobils/01M2PS8C48PG90SYR91887V8CH.jpg',
        'Toyota Camry Hybrid'           => 'mobils/01M2PSBBHSHGGCVFV6P5P39957.png',
        'Honda CR-V Turbo'              => 'mobils/01M2PSJYH6QYQ6E3M2V80FTPEP.jpg',
        'Lexus RX 350h'                 => 'mobils/01M2QCFA3EF8TWN05X0775786R.webp',
        'Mercedes-Benz E-Class E300'    => 'mobils/01M2QCGVMAPZ8BVQRBDE0J8MES.webp',
        'BMW 530i M-Sport'              => 'mobils/01M2QCJHH2BNCMEMCZQ7GQ1B73.webp',
        'Toyota HiAce Premio'           => 'mobils/01M2QCM6DD4M7ZF1Y8YF70PHGX.png',
        'Audi Q7 55 TFSI'               => 'mobils/01M2QCNV8MFHCXNH1FPWZTMJBX.jpg',
        'Tesla Model X Plaid'           => 'mobils/01M2QCDFQ8G6EQ6JF3RHQK4R6W.jpg',
    ];

    public function run(): void
    {
        $terisi = 0;
        $tanpaFile = [];

        foreach ($this->gambar as $nama => $path) {
            $absolut = storage_path('app/public/'.$path);

            if (! is_file($absolut)) {
                $tanpaFile[] = $nama.' ('.$path.')';
                continue;
            }

            $diperbarui = Mobil::query()
                ->where('nama', $nama)
                ->where(function ($query) {
                    $query->whereNull('gambar')->orWhere('gambar', '');
                })
                ->update(['gambar' => $path]);

            $terisi += $diperbarui;
        }

        $this->command?->info("Gambar mobil terisi: {$terisi}");

        if ($tanpaFile !== []) {
            $this->command?->warn('File belum tersedia, dilewati:');
            foreach ($tanpaFile as $file) {
                $this->command?->line(' - '.$file);
            }
        }
    }
}
