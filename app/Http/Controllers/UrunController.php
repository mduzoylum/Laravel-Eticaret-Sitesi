<?php

namespace App\Http\Controllers;

use App\Models\Urun;
use Illuminate\Http\Request;

class UrunController extends Controller
{
    public function index($slug_urunadi)
    {
//        $urun=Urun::where("slug",$slug_urunadi)->firstOrFail();
        $urun=Urun::whereSlug($slug_urunadi)->firstOrFail();
        $kategoriler=$urun->kategoriler()->distinct()->get();
        return view('urun',compact('urun','kategoriler'));
    }
}
