<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use TCG\Voyager\Models\Page;

class FixPages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
			Schema::table('pages', function (Blueprint $table) {
					$table->dropColumn('status');
			});
			Schema::table('pages', function (Blueprint $table) {
					$table->boolean('status')->default(0);
			});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
			Schema::table('pages', function (Blueprint $table) {
					$table->dropColumn('status');
			});
			Schema::table('pages', function (Blueprint $table) {
					$table->enum('status', Page::$statuses)->default(Page::STATUS_INACTIVE);
			});
    }
}
