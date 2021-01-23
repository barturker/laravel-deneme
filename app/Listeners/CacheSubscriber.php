<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Cache\Events\CacheHit;
use Illuminate\Cache\Events\CacheMissed;
use Illuminate\Support\Facades\Log;

class CacheSubscriber
{
  public function handleCacheHit(CacheHit $event){

    Log::info("{$event->key} cache hit");
  }

  public function handleCacheMissed(CacheMissed $event){

    Log::info("{$event->key} cache miss");
  }

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function subscribe($events){
      $events->listen(
        CacheHit::class,
        'App\Listeners\CacheSubscriber@handleCacheHit'
      );

      $events->listen(
        CacheMissed::class,
        'App\Listeners\CacheSubscriber@handleCacheMissed'
      );
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
    }
}
