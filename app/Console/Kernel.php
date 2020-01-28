<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\IGUser;

class Kernel extends ConsoleKernel {
  /**
   * The Artisan commands provided by your application.
   *
   * @var array
   */
  protected $commands = [
    //
  ];

  /**
   * Define the application's command schedule.
   *
   * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
   * @return void
   */
  protected function schedule(Schedule $schedule) {
    $schedule->call(function () {
      // Refresh any expiring Instagram tokens - daily
      array_map(function (IGUser $user) {
        $user->refreshToken();
      }, IGUser::get()->all());
    })->daily();

    $schedule->call(function () {
      // Fetch media from Instagram - hourly
      array_map(function (IGUser $user) {
        $user->fetchMedia();
      }, IGUser::get()->all());
    })->hourly();
  }

  /**
   * Register the commands for the application.
   *
   * @return void
   */
  protected function commands() {
    $this->load(__DIR__.'/Commands');

    require base_path('routes/console.php');
  }
}
