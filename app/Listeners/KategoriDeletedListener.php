<?php

namespace App\Listeners;

use App\Events\KategoriDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class KategoriDeletedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  KategoriDeleted  $event
     * @return void
     */
    public function handle(KategoriDeleted $event)
    {
        dd('Kategori Silindi',$event->kategori);
    }
}
