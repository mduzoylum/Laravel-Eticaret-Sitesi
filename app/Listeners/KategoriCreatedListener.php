<?php

namespace App\Listeners;

use App\Events\KategoriCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class KategoriCreatedListener
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
     * @param  KategoriCreated  $event
     * @return void
     */
    public function handle(KategoriCreated $event)
    {
        dd('Kategori Oluşturuldu',$event->kategori);
    }
}
