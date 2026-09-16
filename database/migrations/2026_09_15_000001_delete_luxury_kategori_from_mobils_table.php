<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('mobils')->where('kategori', 'Luxury')->delete();
    }

    public function down(): void
    {
        // Tidak bisa di-rollback karena data sudah dihapus
    }
};
