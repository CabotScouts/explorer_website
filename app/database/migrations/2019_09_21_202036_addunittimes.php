<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Addunittimes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
			Schema::table('units', function (Blueprint $table) {
				$table->time('start_time')->nullable();
				$table->time('end_time')->nullable();
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
				$table->dropColumn('start_time');
			});
			Schema::table('units', function (Blueprint $table) {
				$table->dropColumn('end_time');
			});
    }
}
