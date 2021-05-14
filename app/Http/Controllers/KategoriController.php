<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index($kategori_slug)
    {
        $kategori=Kategori::where('slug',$kategori_slug)->firstOrFail();
        $alt_kategoriler=Kategori::where("ust_id",$kategori->id)->get();

        $urunler=$kategori->urunler;

        return view('kategori',compact('kategori','alt_kategoriler','urunler'));
    }
}
