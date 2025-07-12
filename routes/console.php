<?php

use App\Console\Commands\UpdateFreeGames;
use Illuminate\Support\Facades\Schedule;

//Artisan::command('inspire', function () {
//    $this->comment(Inspiring::quote());
//})->purpose('Display an inspiring quote');

Schedule::command(UpdateFreeGames::class)->weekly();
