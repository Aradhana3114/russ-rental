<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'urutan'];

    public function mobils()
    {
        return $this->hasMany(Mobil::class, 'kategori_id');
    }
}
