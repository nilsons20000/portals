<?php


use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
namespace App\Listeners;
use App\Events\PostHasViewed;
use Illuminate\Support\Facades\DB;

class Counter
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
     * @param  PostHasViewed  $event
     * @return void
     */
    public function handle(PostHasViewed $event){       
       DB::table('articles')->where('id', $event->post->id )->update([
      'viewed' => \DB::raw('viewed+1'),  ]) ; 

    }
}
