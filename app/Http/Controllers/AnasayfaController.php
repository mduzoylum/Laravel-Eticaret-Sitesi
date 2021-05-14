<?php

namespace App\Http\Controllers;

use App\Events\KategoriCreated;
use App\Models\Kategori;
use App\Models\UrunDetay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AnasayfaController extends Controller
{
    public function index()
    {
        $kategoriler = Kategori::whereNull('ust_id')->take(8)->get();

        $urunler_slider=UrunDetay::with('urun')->where('goster_slider',1)->take(4)->get();
        //todo Urunden Urun Detaya giderek yapılmalı
        return view('anasayfa', compact('kategoriler','urunler_slider'));
    }

}
