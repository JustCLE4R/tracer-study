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
    $startTime = microtime(true);

    $this->callSilent('cache:clear');
    $this->callSilent('config:clear');
    $this->callSilent('route:clear');
    $this->callSilent('view:clear');
    $this->callSilent('clear-compiled');
    $this->callSilent('optimize');

    $executionTime = number_format((microtime(true) - $startTime), 6);
    $executionTimeMS = $executionTime * 1000;

    $this->info(str_pad('Cleared!', 11).' (Execution time: '
        .str_pad($executionTime.'s', 10, ' ', STR_PAD_LEFT)
        .' | '
        .str_pad($executionTimeMS.'ms', 10, ' ', STR_PAD_LEFT)
        .')');
});