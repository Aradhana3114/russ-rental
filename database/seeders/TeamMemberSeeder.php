<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        TeamMember::truncate();

        $team = [
            ['nama' => 'Andi Pratama', 'jabatan' => 'Direktur Utama', 'deskripsi' => 'Memimpin visi Russ Rental sejak awal berdiri. Berpengalaman lebih dari 15 tahun di industri otomotif dan layanan transportasi premium.', 'foto' => 'team/andi-pratama.jpg'],
            ['nama' => 'Rina Wulandari', 'jabatan' => 'Manajer Operasional', 'deskripsi' => 'Mengawasi seluruh operasional harian armada dan tim sopir. Memastikan setiap unit siap dan setiap pelanggan terlayani dengan baik.', 'foto' => 'team/rina-wulandari.jpg'],
            ['nama' => 'Budi Santoso', 'jabatan' => 'Kepala Mekanik', 'deskripsi' => 'Bertanggung jawab atas perawatan dan inspeksi seluruh armada. Setiap mobil melewati standar pemeriksaan ketat sebelum disewakan.', 'foto' => 'team/budi-santoso.jpg'],
            ['nama' => 'Sari Dewi', 'jabatan' => 'Customer Service', 'deskripsi' => 'Melayani pertanyaan dan pemesanan pelanggan dengan ramah dan profesional. Siap membantu 24 jam melalui WhatsApp dan telepon.', 'foto' => 'team/sari-dewi.jpg'],
            ['nama' => 'Maya Putri', 'jabatan' => 'Marketing & Digital', 'deskripsi' => 'Mengelola strategi pemasaran digital dan promosi Russ Rental. Terhubung dengan pelanggan melalui media sosial dan platform online.', 'foto' => 'team/maya-putri.jpg'],
        ];

        foreach ($team as $i => $member) {
            TeamMember::create(array_merge($member, ['urutan' => $i + 1]));
        }
    }
}
