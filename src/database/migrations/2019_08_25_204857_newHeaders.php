<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Header;

class NewHeaders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
			Schema::dropIfExists('headers');

			Schema::create('headers', function (Blueprint $table) {
				$table->increments('id');
				$table->string('name');
				$table->text('aria-description')->nullable();
				$table->string('src')->nullable();
				$table->string('position')->nullable();
				$table->timestamps();
			});

			Schema::table('pages', function (Blueprint $table) {
        $table->foreignIdFor(Header::class)->nullable();
			});

			Schema::table('pages', function(Blueprint $table) {
				$table->dropColumn(['headerposition', 'image']);
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
				$table->text('headerposition')->nullable();
				$table->text('image')->nullable();
			});

			Schema::table('pages', function(Blueprint $table) {
        $table->dropColumn('header_id');
			});

			Schema::dropIfExists('headers');
    }
}
