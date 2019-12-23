<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEventsTables extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
		Schema::create('events', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
      $table->date('start');
      $table->date('end');
      $table->string('location');
      $table->string('description');
      $table->integer('eventsource_id')->references('id')->on('eventsources');
      $table->timestamps();
		});

		Schema::create('eventsources', function (Blueprint $table) {
			$table->increments('id');
      $table->string('name');
      $table->string('type');
      $table->string('cal')
			$table->timestamps();
		});

		Schema::create('calendars', function (Blueprint $table) {
			$table->increments('id');
      $table->string('name');
      $table->string('slug');
			$table->timestamps();
		});

		Schema::create('calendar_eventsource', function(Blueprint $table) {
			$table->integer('calendar_id')->references('id')->on('calendars');
			$table->integer('eventsource_id')->references('id')->on('eventsources');
		});
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('events');
		Schema::dropIfExists('eventsources');
		Schema::dropIfExists('calendars');
		Schema::dropIfExists('calendar_eventsource');
  }
}
