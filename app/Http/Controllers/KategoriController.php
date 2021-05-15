<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index($kategori_slug)
    {
        $kategori = Kategori::where('slug', $kategori_slug)->firstOrFail();
        $alt_kategoriler = Kategori::where("ust_id", $kategori->id)->get();

        $order = request('order');
        if ($order == 'coksatanlar') {
            $urunler = $kategori->urunler()
                ->join('urun_detay', 'urun_detay.urun_id', 'urun.id')
                ->orderBy('urun_detay.goster_cok_satanlar', 'desc')
                ->paginate(2);
        } elseif ($order == 'yeni') {
            $urunler = $kategori->urunler()
                ->orderByDesc('guncelleme_tarihi')
                ->paginate(2);
        } else {
            $urunler = $kategori->urunler()->paginate(2);
        }

        return view('kategori', compact('kategori', 'alt_kategoriler', 'urunler'));
    }
}
