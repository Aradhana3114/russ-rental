<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('mobils', function (Blueprint $table) {
            $table->foreignId('kategori_id')->nullable()->after('nama')->constrained('kategoris')->nullOnDelete();
            $table->foreignId('tipe_id')->nullable()->after('kategori_id')->constrained('tipes')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('mobils', function (Blueprint $table) {
            $table->dropForeign(['kategori_id']);
            $table->dropForeign(['tipe_id']);
            $table->dropColumn(['kategori_id', 'tipe_id']);
        });
    }
};
