<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUnitFeatures extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
		Schema::table('units', function (Blueprint $table) {
			$table->string('color')->nullable();
			$table->string('logo')->nullable();
		});
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
		Schema::table('units', function (Blueprint $table) {
			$table->dropColumn('color');
			$table->dropColumn('logo');
		});
  }
}
