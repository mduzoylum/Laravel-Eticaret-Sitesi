<?php

namespace App\Models;

use App\Events\KategoriCreated;
use App\Events\KategoriDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='kategori';
    protected $guarded=[];

//Event-Listener olarak tetikleme
//    protected $dispatchesEvents=[
//        "created" =>KategoriCreated::class,
//        "deleted" =>KategoriDeleted::class,
//    ];

//Statik olarak tetikleme
//    public static function boot()
//    {
//        parent::boot();
//
//        static::created(function($kategori){
//            dd("Kategori Olusturuldu",$kategori);
//        });
//    }

    const CREATED_AT = 'olusturma_tarihi';
    const UPDATED_AT = 'guncelleme_tarihi';
    const DELETED_AT = 'silinme_tarihi';

    public function subCategory(){
        return $this->hasMany(Kategori::class,'ust_id','id');
    }

    public function urunler()
    {
        return $this->belongsToMany('App\Models\Urun','kategori_urun');
    }


}
