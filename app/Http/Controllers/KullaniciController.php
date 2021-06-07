<?php

namespace App\Http\Controllers;

use App\Mail\KullaniciKayitMail;
use App\Models\Kullanici;
use App\Models\KullaniciDetay;
use App\Models\Sepet;
use App\Models\SepetUrun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mail;
use Cart;

class KullaniciController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('oturumkapat', 'aktiflestir');
    }

    public function giris_form()
    {
        return view('kullanici.oturumac');
    }

    public function giris()
    {
        $this->validate(request(), [
            'mail' => 'required|email',
            'sifre' => 'required'
        ]);

        if (auth()->attempt(['mail' => request('mail'), 'password' => request('sifre')], request('benihatirla'))) {
            request()->session()->regenerate();

            $aktif_sepet_id = Sepet::aktif_sepet_id();
            if(is_null($aktif_sepet_id))
            {
                $aktif_sepet=Sepet::create(["kullanici_id"=>auth()->id()]);
                $aktif_sepet_id=$aktif_sepet->id;
            }

            session()->put('aktif_sepet_id', $aktif_sepet_id);
            if (Cart::count() > 0) {
                foreach (Cart::content() as $cartItem) {
                    SepetUrun::updateOrCreate(
                        ['sepet_id' => $aktif_sepet_id, 'urun_id' => $cartItem->id],
                        ['adet' => $cartItem->qty, 'fiyati' => $cartItem->price, 'durum' => 'Beklemede']
                    );
                }
            }

            Cart::destroy();
            $sepetUrunler = SepetUrun::where('sepet_id', $aktif_sepet_id)->get();
            foreach ($sepetUrunler as $sepetUrun) {
                Cart::add($sepetUrun->urun_id, $sepetUrun->urun->urun_adi, $sepetUrun->adet, $sepetUrun->fiyati, ['slug' => $sepetUrun->urun->slug]);
            }

            return redirect()->intended('/');
        } else {
            $errors = ['mail' => "Hatalı Giriş"];
            return back()->withErrors($errors);
        }

    }

    public function kaydol_form()
    {
        return view('kullanici.kayitol');
    }

    public function kaydol()
    {

        $this->validate(request(), [
            'adsoyad' => 'required|min:5|max:60',
            'mail' => 'required|email|unique:kullanici',
            'sifre' => 'required|confirmed|min:5|max:15'
        ]);

        $kullanici = Kullanici::create([
            'adsoyad' => request('adsoyad'),
            'mail' => request('mail'),
            'sifre' => Hash::make(request('sifre')),
            'aktivasyon_anahtari' => Str::random(60),
            'aktif_mi' => 0,
        ]);
        $kullanici->detay()->save(new KullaniciDetay());

        Mail::to(request('mail'))->send(new KullaniciKayitMail($kullanici));

        auth()->login($kullanici);

        return redirect()->route('anasayfa');
    }

    public function aktiflestir($anahtar)
    {
        $kullanici = Kullanici::where('aktivasyon_anahtari', $anahtar)->first();
        if (!is_null($kullanici)) {
            $kullanici->aktivasyon_anahtari = null;
            $kullanici->aktif_mi = 1;
            $kullanici->save();
            return redirect()->to('/')
                ->with('mesaj', 'Kullanıcı Kaydınız Aktifleştirildi')
                ->with('mesaj_tur', 'success');
        } else {
            return redirect()->to('/')
                ->with('mesaj', 'Aktivasyon anahtari geçersizdir')
                ->with('mesaj_tur', 'danger');
        }
    }

    public function oturumkapat()
    {
        auth()->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('anasayfa');
    }
}
