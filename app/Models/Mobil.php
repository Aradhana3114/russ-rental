<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Mobil extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'slug',
        'kategori_id',
        'tipe_id',
        'jenis_transmisi',
        'tipe_kendaraan',
        'transmisi',
        'kapasitas',
        'stok',
        'harga_per_hari',
        'rating',
        'status',
        'deskripsi',
        'gambar',
    ];

    protected $casts = [
        'harga_per_hari' => 'decimal:0',
        'rating' => 'decimal:1',
    ];

    protected static function booted(): void
    {
        static::saving(function (Mobil $mobil) {
            if (empty($mobil->slug)) {
                $mobil->slug = Str::slug($mobil->nama.'-'.Str::random(4));
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function tipe()
    {
        return $this->belongsTo(Tipe::class);
    }

    /**
     * Hanya mobil yang stoknya masih tersisa untuk hari ini
     * (stok > jumlah booking terkonfirmasi yang aktif hari ini).
     */
    public function scopeAvailableNow($query)
    {
        return $query->where('stok', '>', 0)
            ->whereRaw('stok > (
                select count(*) from bookings
                where bookings.mobil_id = mobils.id
                and bookings.status = ?
                and bookings.tanggal_mulai <= ?
                and bookings.tanggal_selesai >= ?
            )', ['dikonfirmasi', now()->toDateString(), now()->toDateString()]);
    }

    /**
     * Booking terkonfirmasi yang sedang berjalan (mencakup hari ini), jika ada.
     */
    public function activeBooking()
    {
        return $this->bookings()
            ->where('status', 'dikonfirmasi')
            ->whereDate('tanggal_mulai', '<=', now())
            ->whereDate('tanggal_selesai', '>=', now())
            ->first();
    }

    /**
     * Berapa unit yang sedang disewa (booking terkonfirmasi) hari ini.
     */
    public function unitTerpakaiHariIni(): int
    {
        return $this->bookings()
            ->where('status', 'dikonfirmasi')
            ->whereDate('tanggal_mulai', '<=', now())
            ->whereDate('tanggal_selesai', '>=', now())
            ->count();
    }

    /**
     * Sisa unit yang masih bisa dibooking hari ini.
     */
    public function getUnitTersediaAttribute(): int
    {
        return max(0, (int) $this->stok - $this->unitTerpakaiHariIni());
    }

    public function isBookedNow(): bool
    {
        return $this->unit_tersedia <= 0;
    }
}
