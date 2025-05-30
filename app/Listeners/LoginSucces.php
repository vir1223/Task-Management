<?php

namespace App\Listeners;

use App\Events\user;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LoginSucces
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(user $event): void
    {
        info(' logged in successfully.');
    }
}
