<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Rename kategori → jenis_transmisi, tipe → tipe_kendaraan
        Schema::table('mobils', function (Blueprint $table) {
            $table->string('jenis_transmisi')->default('AT')->after('nama');
            $table->string('tipe_kendaraan')->default('Sedan')->after('jenis_transmisi');
        });

        // 2. Map data lama:
        //    transmisi (AT/CVT) → jenis_transmisi
        //    kategori (MVP/SUV/Sedan) → tipe_kendaraan
        DB::statement("UPDATE mobils SET jenis_transmisi = CASE transmisi WHEN 'CVT' THEN 'CVT' ELSE 'Automatic (AT/Matic)' END");
        DB::statement("UPDATE mobils SET tipe_kendaraan = CASE kategori WHEN 'MVP' THEN 'MPV' ELSE kategori END");

        // 3. Drop kolom lama
        Schema::table('mobils', function (Blueprint $table) {
            $table->dropColumn(['kategori', 'tipe']);
        });
    }

    public function down(): void
    {
        Schema::table('mobils', function (Blueprint $table) {
            $table->string('kategori')->default('Sedan')->after('nama');
            $table->enum('tipe', ['luxury', 'basic'])->default('basic')->after('kategori');
        });

        DB::statement("UPDATE mobils SET kategori = tipe_kendaraan");
        DB::statement("UPDATE mobils SET tipe = 'basic'");

        Schema::table('mobils', function (Blueprint $table) {
            $table->dropColumn(['jenis_transmisi', 'tipe_kendaraan']);
        });
    }
};
