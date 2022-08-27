<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUnitCoordinates extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
		Schema::table('units', function (Blueprint $table) {
			$table->string('coordinates')->nullable();
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
			$table->dropColumn('coordinates');
		});
  }
}
