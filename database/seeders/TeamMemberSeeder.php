<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $team = [
            ['nama' => 'Hendrikus "Russ" Soedirgo', 'jabatan' => 'Managing Director & Founder', 'deskripsi' => 'Pelopor sektor private touring dan transit protokoler di Asia Tenggara dengan ketepatan waktu tanpa kompromi serta dedikasi diskresi penuh.'],
            ['nama' => 'Sarah Pamela Tan', 'jabatan' => 'Head of Fleet Operations', 'deskripsi' => 'Mengawasi kesiapan operasional harian armada 150+ unit di Jakarta dan Bali dengan presisi kabin kelas satu maskapai pada detail otomotif.'],
            ['nama' => 'Budi Santoso', 'jabatan' => 'Chief Fleet Supervisor', 'deskripsi' => 'Master teknisi bersertifikat dan instruktur defensive driving yang melakukan audit keselamatan 140 titik pada setiap penambahan unit armada.'],
            ['nama' => 'Kevin Arisandi', 'jabatan' => 'Lead Web & Telematics Developer', 'deskripsi' => 'Arsitek di balik mesin booking cepat Russ Rental, telemetri satelit real-time, serta sistem serah terima digital biometrik.'],
            ['nama' => 'Jessica Wijaya', 'jabatan' => 'VIP Concierge & Reservations Lead', 'deskripsi' => 'Penanggung jawab utama bagi delegasi diplomatik, rombongan produksi film internasional, dan acara pernikahan bergengsi.'],
        ];

        foreach ($team as $i => $member) {
            TeamMember::create(array_merge($member, ['urutan' => $i]));
        }
    }
}
