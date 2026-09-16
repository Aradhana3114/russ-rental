<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambah kolom 'stok' — jumlah unit fisik yang dimiliki Russ Rental
     * untuk model mobil tersebut (bukan status sewa per-unit).
     */
    public function up(): void
    {
        Schema::table('mobils', function (Blueprint $table) {
            $table->unsignedInteger('stok')->default(1)->after('kapasitas');
        });
    }

    public function down(): void
    {
        Schema::table('mobils', function (Blueprint $table) {
            $table->dropColumn('stok');
        });
    }
};
