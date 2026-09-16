<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class BookingController extends Controller
{
    public function create(Request $request)
    {
        $mobils = Mobil::where('status', 'tersedia')
            ->availableNow()
            ->orderBy('nama')
            ->get();

        $selectedMobil = $request->filled('mobil')
            ? Mobil::where('slug', $request->query('mobil'))->first()
            : null;

        return view('pages.booking', compact('mobils', 'selectedMobil'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'mobil_id'         => ['required', 'exists:mobils,id'],
            'nama'             => ['required', 'string', 'max:150'],
            'whatsapp'         => ['required', 'string', 'max:30'],
            'tanggal_mulai'    => ['required', 'date', 'after_or_equal:today'],
            'tanggal_selesai'  => ['required', 'date', 'after_or_equal:tanggal_mulai'],
            'catatan'          => ['nullable', 'string', 'max:2000'],
        ], [
            'mobil_id.required'        => 'Silakan pilih mobil yang ingin dibooking.',
            'mobil_id.exists'          => 'Mobil yang dipilih tidak tersedia.',
            'nama.required'            => 'Nama lengkap wajib diisi.',
            'whatsapp.required'        => 'Nomor WhatsApp wajib diisi.',
            'tanggal_mulai.required'   => 'Tanggal mulai sewa wajib diisi.',
            'tanggal_mulai.after_or_equal' => 'Tanggal mulai tidak boleh sebelum hari ini.',
            'tanggal_selesai.required' => 'Tanggal selesai sewa wajib diisi.',
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai tidak boleh sebelum tanggal mulai.',
        ]);

        $mobil = Mobil::findOrFail($validated['mobil_id']);

        $unitTerpakai = Booking::where('mobil_id', $validated['mobil_id'])
            ->where('status', 'dikonfirmasi')
            ->where('tanggal_mulai', '<=', $validated['tanggal_selesai'])
            ->where('tanggal_selesai', '>=', $validated['tanggal_mulai'])
            ->count();

        if ($unitTerpakai >= $mobil->stok) {
            return back()
                ->withInput()
                ->withErrors(['mobil_id' => 'Mohon maaf, seluruh unit '.$mobil->nama.' ('.$mobil->stok.' unit) sudah dibooking untuk rentang tanggal tersebut. Silakan pilih mobil lain atau ubah tanggal sewa Anda.']);
        }

        Booking::create(array_merge($validated, [
            'status' => 'dikonfirmasi',
        ]));

        return back()->with('success', 'Terima Kasih! Telah Boking di RUSS RENTAL, Admin RUSS akan menghubungin anda melalu WhatsApp anda');
    }
}
