<?php

use App\Console\Commands\UpdateFreeGames;
use Illuminate\Support\Facades\Schedule;

Schedule::command(UpdateFreeGames::class)->weekly();
