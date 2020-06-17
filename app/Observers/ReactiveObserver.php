<?php

namespace App\Observers;

use App\Reactive;

class ReactiveObserver
{
    /**
     * Handle the reactive "created" event.
     *
     * @param  \App\Reactive  $reactive
     * @return void
     */
    public function created(Reactive $reactive)
    {
        //
    }

    /**
     * Handle the reactive "updated" event.
     *
     * @param  \App\Reactive  $reactive
     * @return void
     */
    public function updated(Reactive $reactive)
    {
        //
    }

    /**
     * Handle the reactive "deleted" event.
     *
     * @param  \App\Reactive  $reactive
     * @return void
     */
    public function deleted(Reactive $reactive)
    {
        foreach ($reactive->stocks()->get() as $stock){
            $stock->delete();
        }
    }

    /**
     * Handle the reactive "restored" event.
     *
     * @param  \App\Reactive  $reactive
     * @return void
     */
    public function restored(Reactive $reactive)
    {

    }

    /**
     * Handle the reactive "force deleted" event.
     *
     * @param  \App\Reactive  $reactive
     * @return void
     */
    public function forceDeleted(Reactive $reactive)
    {
        //
    }
}
