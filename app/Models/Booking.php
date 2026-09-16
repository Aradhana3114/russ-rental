<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'mobil_id',
        'nama',
        'whatsapp',
        'tanggal_mulai',
        'tanggal_selesai',
        'catatan',
        'status',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }
}
