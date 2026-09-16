<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('kategori'); // Luxury Sedan, SUV, Prestige MPV, Electric & Hybrid
            $table->string('transmisi')->default('Otomatis');
            $table->unsignedTinyInteger('kapasitas')->default(4);
            $table->decimal('harga_per_hari', 12, 0);
            $table->decimal('rating', 2, 1)->default(4.8);
            $table->enum('status', ['tersedia', 'disewa', 'servis'])->default('tersedia');
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};
