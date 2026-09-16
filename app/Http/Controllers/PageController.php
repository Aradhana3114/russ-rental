<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $mobils = Mobil::where('status', 'tersedia')
            ->availableNow()
            ->orderByDesc('rating')
            ->take(8)
            ->get();

        return view('pages.home', compact('mobils'));
    }

    public function about()
    {
        $stats = [
            'fleet' => Mobil::count().'+',
            'journeys' => '12k+',
            'ontime' => '99.8%',
        ];

        return view('pages.about', compact('stats'));
    }

    public function services(Request $request)
    {
        $query = Mobil::query();

        if ($request->filled('kategori')) {
            $query->where('tipe_kendaraan', $request->kategori);
        }

        if ($request->filled('search')) {
            $query->where('nama', 'like', '%'.$request->search.'%');
        }

        $mobils = $query->orderByDesc('rating')->paginate(9)->withQueryString();

        $kategoriList = Mobil::selectRaw('tipe_kendaraan, count(*) as jumlah')
            ->groupBy('tipe_kendaraan')
            ->pluck('jumlah', 'tipe_kendaraan');

        return view('pages.services', compact('mobils', 'kategoriList'));
    }

    public function team()
    {
        $team = TeamMember::orderBy('urutan')->get();

        return view('pages.team', compact('team'));
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
