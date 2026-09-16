<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Mobil;
use App\Models\Tipe;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MobilSeeder extends Seeder
{
    public function run(): void
    {
        $mobils = [
            ['nama' => 'Toyota Alphard Executive', 'tipe_kendaraan' => 'MPV', 'jenis_transmisi' => 'Automatic (AT/Matic)', 'kapasitas' => 6, 'stok' => 4, 'harga_per_hari' => 2200000, 'rating' => 4.9],
            ['nama' => 'Land Rover Defender 110', 'tipe_kendaraan' => 'SUV', 'jenis_transmisi' => 'Automatic (AT/Matic)', 'kapasitas' => 7, 'stok' => 2, 'harga_per_hari' => 3800000, 'rating' => 4.9],
            ['nama' => 'Porsche Taycan 4S', 'tipe_kendaraan' => 'Sedan', 'jenis_transmisi' => 'Automatic (AT/Matic)', 'kapasitas' => 4, 'stok' => 1, 'harga_per_hari' => 5000000, 'rating' => 5.0],
            ['nama' => 'Toyota Innova Zenix Q', 'tipe_kendaraan' => 'MPV', 'jenis_transmisi' => 'CVT', 'kapasitas' => 7, 'stok' => 5, 'harga_per_hari' => 850000, 'rating' => 4.9],
            ['nama' => 'Toyota Vellfire Comfort', 'tipe_kendaraan' => 'MPV', 'jenis_transmisi' => 'Automatic (AT/Matic)', 'kapasitas' => 6, 'stok' => 3, 'harga_per_hari' => 2000000, 'rating' => 4.8],
            ['nama' => 'Hyundai Staria Premium', 'tipe_kendaraan' => 'MPV', 'jenis_transmisi' => 'Automatic (AT/Matic)', 'kapasitas' => 8, 'stok' => 2, 'harga_per_hari' => 1800000, 'rating' => 4.7],
            ['nama' => 'BMW X7 xDrive40i', 'tipe_kendaraan' => 'SUV', 'jenis_transmisi' => 'Automatic (AT/Matic)', 'kapasitas' => 7, 'stok' => 2, 'harga_per_hari' => 3500000, 'rating' => 4.9],
            ['nama' => 'Mercedes-Benz GLE 450', 'tipe_kendaraan' => 'SUV', 'jenis_transmisi' => 'Automatic (AT/Matic)', 'kapasitas' => 5, 'stok' => 2, 'harga_per_hari' => 3200000, 'rating' => 4.8],
            ['nama' => 'Toyota Fortuner VRZ', 'tipe_kendaraan' => 'SUV', 'jenis_transmisi' => 'Automatic (AT/Matic)', 'kapasitas' => 7, 'stok' => 5, 'harga_per_hari' => 900000, 'rating' => 4.7],
            ['nama' => 'Mitsubishi Pajero Sport Dakar', 'tipe_kendaraan' => 'SUV', 'jenis_transmisi' => 'Automatic (AT/Matic)', 'kapasitas' => 7, 'stok' => 4, 'harga_per_hari' => 850000, 'rating' => 4.6],
            ['nama' => 'Toyota Camry Hybrid', 'tipe_kendaraan' => 'Sedan', 'jenis_transmisi' => 'CVT', 'kapasitas' => 4, 'stok' => 3, 'harga_per_hari' => 1200000, 'rating' => 4.8],
            ['nama' => 'Honda CR-V Turbo', 'tipe_kendaraan' => 'SUV', 'jenis_transmisi' => 'CVT', 'kapasitas' => 5, 'stok' => 4, 'harga_per_hari' => 750000, 'rating' => 4.7],
            ['nama' => 'Lexus RX 350h', 'tipe_kendaraan' => 'SUV', 'jenis_transmisi' => 'Automatic (AT/Matic)', 'kapasitas' => 5, 'stok' => 1, 'harga_per_hari' => 3800000, 'rating' => 4.9],
            ['nama' => 'Mercedes-Benz E-Class E300', 'tipe_kendaraan' => 'Sedan', 'jenis_transmisi' => 'Automatic (AT/Matic)', 'kapasitas' => 4, 'stok' => 2, 'harga_per_hari' => 2800000, 'rating' => 4.8],
            ['nama' => 'BMW 530i M-Sport', 'tipe_kendaraan' => 'Sedan', 'jenis_transmisi' => 'Automatic (AT/Matic)', 'kapasitas' => 4, 'stok' => 2, 'harga_per_hari' => 2600000, 'rating' => 4.8],
            ['nama' => 'Toyota HiAce Premio', 'tipe_kendaraan' => 'Van', 'jenis_transmisi' => 'Automatic (AT/Matic)', 'kapasitas' => 12, 'stok' => 3, 'harga_per_hari' => 1500000, 'rating' => 4.6],
            ['nama' => 'Audi Q7 55 TFSI', 'tipe_kendaraan' => 'SUV', 'jenis_transmisi' => 'Automatic (AT/Matic)', 'kapasitas' => 7, 'stok' => 1, 'harga_per_hari' => 3500000, 'rating' => 4.9],
            ['nama' => 'Tesla Model X Plaid', 'tipe_kendaraan' => 'SUV', 'jenis_transmisi' => 'Automatic (AT/Matic)', 'kapasitas' => 6, 'stok' => 1, 'harga_per_hari' => 4500000, 'rating' => 5.0],
        ];

        $mapJenisTransmisi = [
            'CVT' => 'CVT (Continuously Variable Transmission)',
            'AT'  => 'Automatic (AT/Matic)',
        ];

        foreach ($mobils as $mobil) {
            if (Mobil::where('nama', $mobil['nama'])->exists()) {
                continue;
            }

            $kategori = Kategori::where('nama', $mobil['tipe_kendaraan'])->first();
            $tipeNama = $mapJenisTransmisi[$mobil['jenis_transmisi']] ?? $mobil['jenis_transmisi'];
            $tipe = Tipe::where('nama', $tipeNama)->first();

            Mobil::create(array_merge($mobil, [
                'slug'         => Str::slug($mobil['nama']).'-'.Str::random(4),
                'kategori_id'  => $kategori?->id,
                'tipe_id'      => $tipe?->id,
                'transmisi'    => str_contains($mobil['jenis_transmisi'], 'CVT') ? 'CVT' : 'AT',
                'status'       => 'tersedia',
                'deskripsi'    => 'Armada premium '.$mobil['nama'].' siap disewa dengan asuransi penuh dari Russ Rental.',
            ]));
        }
    }
}
