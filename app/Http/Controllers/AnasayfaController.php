<?php

namespace App\Http\Controllers;

use App\Events\KategoriCreated;
use App\Models\Kategori;
use App\Models\Urun;
use App\Models\UrunDetay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AnasayfaController extends Controller
{
    public function index()
    {
        $kategoriler = Kategori::whereNull('ust_id')->take(8)->get();

        $urunler_slider = Urun::select('urun.*')
            ->join('urun_detay', "urun_detay.urun_id", 'urun.id')
            ->where('urun_detay.goster_slider', 1)
            ->orderBy('urun.guncelleme_tarihi', 'desc')
            ->take(4)
            ->get();

        $urun_gunun_firsati = Urun::select('urun.*')
            ->join('urun_detay', "urun_detay.urun_id", 'urun.id')
            ->where('urun_detay.goster_gunun_firsati', 1)
            ->orderBy('urun.guncelleme_tarihi', 'desc')
            ->first();

        $urunler_one_cikan = Urun::select('urun.*')
            ->join('urun_detay', "urun_detay.urun_id", 'urun.id')
            ->where('urun_detay.goster_one_cikan', 1)
            ->orderBy('urun.guncelleme_tarihi', 'desc')
            ->take(4)
            ->get();

        $urunler_cok_satan = Urun::select('urun.*')
            ->join('urun_detay', "urun_detay.urun_id", 'urun.id')
            ->where('urun_detay.goster_cok_satanlar', 1)
            ->orderBy('urun.guncelleme_tarihi', 'desc')
            ->take(4)
            ->get();

        $urunler_indirimli = Urun::select('urun.*')
            ->join('urun_detay', "urun_detay.urun_id", 'urun.id')
            ->where('urun_detay.goster_indirimli', 1)
            ->orderBy('urun.guncelleme_tarihi', 'desc')
            ->take(4)
            ->get();


        return view('anasayfa', compact('kategoriler', 'urunler_slider','urun_gunun_firsati','urunler_one_cikan','urunler_cok_satan','urunler_indirimli'));
    }

}
