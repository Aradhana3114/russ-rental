<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama'     => ['required', 'string', 'max:150'],
            'telepon'  => ['required', 'string', 'max:30'],
            'email'    => ['required', 'email', 'max:150'],
            'layanan'  => ['nullable', 'string', 'max:50'],
            'pesan'    => ['required', 'string', 'max:2000'],
        ], [
            'nama.required'    => 'Nama lengkap wajib diisi.',
            'telepon.required' => 'Nomor telepon/WhatsApp wajib diisi.',
            'email.required'   => 'Alamat email wajib diisi.',
            'email.email'      => 'Format email tidak valid.',
            'pesan.required'   => 'Saran atau kritik Anda wajib diisi.',
        ]);

        ContactMessage::create($validated);

        return back()->with('success', 'Terima kasih! Saran/kritik Anda telah kami terima. Tim Russ Rental akan meninjaunya sesegera mungkin.');
    }
}
