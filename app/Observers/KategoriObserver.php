<?php

namespace App\Observers;

use App\Models\Kategori;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class KategoriObserver
{

    public function saving(Kategori $kategori)
    {
        //Log::info("Saving içindeyim", []);
        //$kategori->slug = Str::slug($kategori->kategori_adi);
    }

    public function deleting(Kategori $kategori)
    {
        //todo deleted olayına bakılacak
        Log::info("deleting içindeyim", []);
//        $kategori->subCategory()->delete();
    }

    /**
     * Handle the Kategori "created" event.
     *
     * @param \App\Models\Kategori $kategori
     * @return void
     */
    public function created(Kategori $kategori)
    {
        Log::info("Created içindeyim", []);
    }

    /**
     * Handle the Kategori "updated" event.
     *
     * @param \App\Models\Kategori $kategori
     * @return void
     */
    public function updated(Kategori $kategori)
    {
        Log::info("Updated içindeyim", []);
    }

    /**
     * Handle the Kategori "deleted" event.
     *
     * @param \App\Models\Kategori $kategori
     * @return void
     */
    public function deleted(Kategori $kategori)
    {
        Log::info("Deleted içindeyim", []);
        $kategori->subCategory()->delete();
    }

    /**
     * Handle the Kategori "restored" event.
     *
     * @param \App\Models\Kategori $kategori
     * @return void
     */
    public function restored(Kategori $kategori)
    {
        Log::info("restored içindeyim", []);
    }

    /**
     * Handle the Kategori "force deleted" event.
     *
     * @param \App\Models\Kategori $kategori
     * @return void
     */
    public function forceDeleted(Kategori $kategori)
    {
        Log::info("forceDeleted içindeyim", []);
    }
}
