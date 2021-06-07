<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KullaniciDetay extends Model
{
    use HasFactory;

    protected $table = 'kullanici_detay';
    protected $guarded = [];

    const CREATED_AT = 'olusturma_tarihi';
    const UPDATED_AT = 'guncelleme_tarihi';
    const DELETED_AT = 'silinme_tarihi';

    public function kullanici()
    {
        return $this->belongsTo('App\Models\Kullanici');
    }

}
