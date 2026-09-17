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

        $unitCount = Mobil::count();

        return view('pages.home', compact('mobils', 'unitCount'));
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

        $tersediaHariIni = Mobil::all()->filter(function($mobil) {
            return $mobil->unit_tersedia > 0;
        })->count();

        return view('pages.services', compact('mobils', 'kategoriList', 'tersediaHariIni'));
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

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function terms()
    {
        return view('pages.terms');
    }

    public function insurance()
    {
        return view('pages.insurance');
    }
}
