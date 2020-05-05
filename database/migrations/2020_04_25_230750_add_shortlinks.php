<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddShortlinks extends Migration {

  public function up()
  {
    Schema::dropIfExists('shortlinks');

    Schema::create('shortlinks', function (Blueprint $table) {
      $table->increments('id');
      $table->string('code');
      $table->string('url');
      $table->timestamps();
    })
  }

  public function down() {
    Schema::dropIfExists('shortlinks');
  }
}
