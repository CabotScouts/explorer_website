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
      $table->string('code')->unique();
      $table->string('url');
      $table->bigInteger('clicks')->default(0);
      $table->timestamps();
    });
  }

  public function down() {
    Schema::dropIfExists('shortlinks');
  }
}
