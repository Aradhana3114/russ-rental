<?php

namespace Database\Seeders;

use App\Models\Tipe;
use Illuminate\Database\Seeder;

class TipeSeeder extends Seeder
{
    public function run(): void
    {
        $tipes = [
            ['nama' => 'Manual',                                                'urutan' => 1],
            ['nama' => 'Automatic (AT/Matic)',                                  'urutan' => 2],
            ['nama' => 'CVT (Continuously Variable Transmission)',              'urutan' => 3],
            ['nama' => 'DCT (Dual Clutch Transmission)',                        'urutan' => 4],
            ['nama' => 'AMT (Automated Manual Transmission)',                   'urutan' => 5],
        ];

        foreach ($tipes as $tipe) {
            Tipe::updateOrCreate(
                ['nama' => $tipe['nama']],
                $tipe
            );
        }
    }
}
