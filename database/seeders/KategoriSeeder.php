<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategoris = [
            ['nama' => 'Sedan',          'urutan' => 1],
            ['nama' => 'SUV',            'urutan' => 2],
            ['nama' => 'MPV',            'urutan' => 3],
            ['nama' => 'Hatchback',      'urutan' => 4],
            ['nama' => 'Coupe',          'urutan' => 5],
            ['nama' => 'Sport Car',      'urutan' => 6],
            ['nama' => 'Luxury',         'urutan' => 7],
            ['nama' => 'Pickup',         'urutan' => 8],
            ['nama' => 'Van',            'urutan' => 9],
            ['nama' => 'Wagon',          'urutan' => 10],
            ['nama' => 'Crossover',      'urutan' => 11],
        ];

        foreach ($kategoris as $kategori) {
            Kategori::updateOrCreate(
                ['nama' => $kategori['nama']],
                $kategori
            );
        }
    }
}
