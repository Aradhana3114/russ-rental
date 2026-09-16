<?php

namespace App\Console\Commands;

use App\Models\Booking;
use Illuminate\Console\Command;

class BookingCompleteExpired extends Command
{
    protected $signature = 'booking:complete-expired';

    protected $description = 'Tandai booking yang sudah lewat tanggal selesai sebagai selesai';

    public function handle(): int
    {
        $updated = Booking::where('status', 'dikonfirmasi')
            ->whereRaw('? >= tanggal_selesai + INTERVAL 1 DAY + INTERVAL 6 HOUR', [now()->toDateTimeString()])
            ->update(['status' => 'selesai']);

        if ($updated > 0) {
            $this->info("{$updated} booking ditandai sebagai selesai.");
        } else {
            $this->info('Tidak ada booking yang perlu diselesaikan.');
        }

        return Command::SUCCESS;
    }
}
