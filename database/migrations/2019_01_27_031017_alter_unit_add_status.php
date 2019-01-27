<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUnitAddStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
			Schema::table('units', function (Blueprint $table) {
					$table->string('status')->default('hidden');
					$table->integer('day')->default('-1')->change();
			});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
			Schema::create('units', function (Blueprint $table) {
					$table->dropColumn('status');
			});
    }
}
