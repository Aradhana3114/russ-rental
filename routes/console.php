<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('booking:complete-expired')->everyMinute();
