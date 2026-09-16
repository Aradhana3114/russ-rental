<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Mobil;
use App\Models\Tipe;
use Illuminate\Database\Seeder;

class SyncMobilFKSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Mobil::all() as $mobil) {
            $kategori = Kategori::where('nama', $mobil->tipe_kendaraan)->first();
            $tipe = Tipe::where('nama', $mobil->jenis_transmisi)->first();

            $mobil->update([
                'kategori_id' => $kategori?->id,
                'tipe_id'     => $tipe?->id,
            ]);
        }
    }
}
