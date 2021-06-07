<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siparis extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = "siparis";
    protected $fillable = ['sepet_id', 'siparis_tutari', 'banka', 'taksit_sayisi', 'durum','adsoyad','adres','telefon','ceptelefonu'];

    const CREATED_AT = 'olusturma_tarihi';
    const UPDATED_AT = 'guncelleme_tarihi';
    const DELETED_AT = 'silinme_tarihi';

    public function sepet()
    {
        return $this->belongsTo('App\Models\Sepet');
    }
}
