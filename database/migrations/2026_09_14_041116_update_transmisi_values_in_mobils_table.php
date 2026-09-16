<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('mobils')->where('transmisi', 'Otomatis')->update(['transmisi' => 'AT']);
        DB::table('mobils')->where('transmisi', 'Otomatis 9G-Tronic')->update(['transmisi' => 'AT']);
        DB::table('mobils')->where('transmisi', 'Otomatis Direct-Shift')->update(['transmisi' => 'AT']);
        DB::table('mobils')->where('transmisi', 'Otomatis 4x4')->update(['transmisi' => 'AT']);
        DB::table('mobils')->where('transmisi', 'Otomatis 2-Speed')->update(['transmisi' => 'AT']);
        DB::table('mobils')->where('transmisi', 'Otomatis Steptronic')->update(['transmisi' => 'AT']);
        DB::table('mobils')->where('transmisi', 'Hybrid Otomatis')->update(['transmisi' => 'CVT']);
    }

    public function down(): void
    {
        DB::table('mobils')->where('transmisi', 'AT')->update(['transmisi' => 'Otomatis']);
        DB::table('mobils')->where('transmisi', 'CVT')->update(['transmisi' => 'Otomatis']);
    }
};
