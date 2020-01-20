<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInstagramTables extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
      Schema::dropIfExists('IGUsers');
      Schema::dropIfExists('IGMedia');

      Schema::create('IGUsers', function (Blueprint $table) {
        $table->increments('id');
        $table->string('ig_id');
        $table->string('ig_username')->nullable();
        $table->string('token')->nullable();
        $table->string('expires')->nullable();
        $table->timestamps();
      });

      Schema::create('IGMedia', function (Blueprint $table) {
        $table->increments('id');
        $table->string('ig_id')->references('ig_id')->on('IGUsers');
        $table->integer('parent_id')->references('id')->on('IGMedia')->nullable();
        $table->string('media_id');
        $table->enum('media_type', ['IMAGE', 'VIDEO', 'CAROUSEL_ALBUM'])->nullable();
        $table->string('media_url')->nullable();
        $table->string('media_thumbnail')->nullable();
        $table->string('caption')->nullable();
        $table->datetime('timestamp')->nullable();
        $table->timestamps();
      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
      Schema::dropIfExists('IGUsers');
      Schema::dropIfExists('IGMedia');
    }
}
