<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AnasayfaController extends Controller
{
    public function index()
    {
        $kategoriler = Kategori::whereNull('ust_id')->take(8)->get();
        return view('anasayfa', compact('kategoriler'));
    }
}
