<?php

use App\Http\Controllers\AnasayfaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UrunController;
use App\Http\Controllers\SepetController;
use App\Http\Controllers\OdemeController;
use App\Http\Controllers\SiparisController;
use App\Http\Controllers\KullaniciController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Yonetim\KullaniciController as YoneticiKullaniciController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Lenovo Thinkpad Ryzen
SelfLink
lenovo-thinkpad-tyzen
Observer -> Trigger
User -> delete ->trigger | orders ->user_id ->delete
*/
//
Route::group(['prefix' =>"yonetim"],function(){ // "namespace"=>"Yonetim"
    Route::get('/',function (){
        return 'admin';
    });

    Route::get('oturumac',[YoneticiKullaniciController::class,'index'])->name('yonetim.oturumac');
});

Route::get('/', [AnasayfaController::class, 'index'])->name('anasayfa');
Route::get('/kategori/{kategori_slug}', [KategoriController::class, 'index'])->name('kategori');
Route::get('/urun/{slug_urunadi}', [UrunController::class, 'index'])->name('urun');
Route::get('/ara', [UrunController::class, 'ara'])->name('urun_ara_get');
Route::post('/ara', [UrunController::class, 'ara'])->name('urun_ara');

Route::group(['prefix' => 'sepet'], function () {
    Route::get('/', [SepetController::class, 'index'])->name('sepet');
    Route::post('/ekle', [SepetController::class, 'ekle'])->name('sepet.ekle');
    Route::delete('/kaldir/{rowid}', [SepetController::class, 'kaldir'])->name('sepet.kaldir');
    Route::delete('/bosalt', [SepetController::class, 'bosalt'])->name('sepet.bosalt');
    Route::patch('/guncelle/{rowid}', [SepetController::class, 'guncelle'])->name('sepet.guncelle');
});

Route::get('/odeme',[OdemeController::class,'index'])->name("odeme");
Route::post('/odemeyap',[OdemeController::class,'odemeyap'])->name("odemeyap");

Route::group(['middleware' => 'auth'], function () {
//    Route::get('/odeme', [OdemeController::class, 'index'])->name('odeme');
    Route::get('/siparisler', [SiparisController::class, 'index'])->name('siparisler');
    Route::get('/siparisler/{id}', [SiparisController::class, 'detay'])->name('siparis');
});

Route::group(['prefix' => 'kullanici', 'as' => 'kullanici.'], function () {
    Route::get('/oturumac', [KullaniciController::class, 'giris_form'])->name('oturumac.form'); //oturumac
    Route::post('/oturumac', [KullaniciController::class, 'giris'])->name('oturumac');
    Route::get('/kayitol', [KullaniciController::class, 'kaydol_form'])->name('kaydol.form');
    Route::post('/kayitol', [KullaniciController::class, 'kaydol'])->name('kaydol');
    Route::get('/aktiflestir/{anahtar}', [KullaniciController::class, 'aktiflestir'])->name('aktiflestir');
    Route::post('/oturumkapat', [KullaniciController::class, 'oturumkapat'])->name('oturumkapat');
});

//todo bunu manuel olarak değil config içerisinden çözmeliyiz -> Mustafa

Route::get('/test', [AnasayfaController::class, 'test'])->name('test');
Route::get('/test/mail', function () {
    return new \App\Mail\KullaniciKayitMail();
});

//Route::any('{all}', 'Api\Auth\LoginController@pageNotFound')->where('all', '^(?!api).*$'); // İstek bulunamadıgında şuraya yönlendir
