<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('mobils', function (Blueprint $table) {
            $table->enum('tipe', ['luxury', 'basic'])->default('basic')->after('kategori');
        });
    }

    public function down(): void
    {
        Schema::table('mobils', function (Blueprint $table) {
            $table->dropColumn('tipe');
        });
    }
};
