<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInstagramTags extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::dropIfExists('IGTags');
    Schema::dropIfExists('IGMedia_IGTags');

    Schema::create('IGTags', function (Blueprint $table) {
      $table->increments('id');
      $table->string('tag');
      $table->string('formatted');
    });

    Schema::create('IGMedia_IGTags', function (Blueprint $table) {
      $table->integer('tag_id');
      $table->integer('media_id');
    });

    Schema::table('units', function (Blueprint $table) {
			$table->string('tag')->nullable();
      $table->string('permalink')->nullable();
		});
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('IGTags');
    Schema::dropIfExists('IGMedia_IGTags');

    Schema::table('units', function (Blueprint $table) {
			$table->dropColumn('tag');
		});
  }
}
