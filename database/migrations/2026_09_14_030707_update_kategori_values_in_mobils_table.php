<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('mobils')->where('kategori', 'Luxury Sedan')->update(['kategori' => 'Luxury']);
        DB::table('mobils')->where('kategori', 'Prestige MPV')->update(['kategori' => 'MVP']);
        DB::table('mobils')->where('kategori', 'Electric & Hybrid')->update(['kategori' => 'Sedan']);
    }

    public function down(): void
    {
        DB::table('mobils')->where('kategori', 'Luxury')->update(['kategori' => 'Luxury Sedan']);
        DB::table('mobils')->where('kategori', 'MVP')->update(['kategori' => 'Prestige MPV']);
        DB::table('mobils')->where('kategori', 'Sedan')->update(['kategori' => 'Electric & Hybrid']);
    }
};
