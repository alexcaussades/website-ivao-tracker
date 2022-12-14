<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Artisan::command('clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    $this->info('Cache cleared!');
})->purpose('Clear the application cache');

Artisan::command('cache', function () {
    Artisan::call('view:cache');
    Artisan::call('route:cache');
    $this->info('Cache ok!');
})->purpose('Clear the application cache');

Artisan::command("ttc", function () {
    Artisan::call('clear');
    Artisan::call('cache');
    $this->info("Total : Clean and Cache => ok");
})->purpose("Clear and cache");