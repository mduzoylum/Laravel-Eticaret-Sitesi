<?php

namespace App\Http\Controllers;

use App\Models\Urun;
use Illuminate\Http\Request;

class SepetController extends Controller
{
    public function index()
    {
        return view('sepet');
    }

    public function ekle()
    {
        $urun=Urun::find(request('id'));
//        echo Cart->count();
        \Cart::count();
        \test::Ekle();
    }
}

