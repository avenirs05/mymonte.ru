<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealtiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('realties', function (Blueprint $table) {
			$table->increments('id');		

			$table->enum('type',        ['villa', 'apartment'])->default('apartment');
			$table->enum('type_ru',     ['вилла', 'апартамент'])->default('апартамент');
			$table->enum('type_en',     ['villa', 'apartment'])->default('apartment');
			$table->enum('visibility',  ['опубликовано', 'скрыто'])->default('опубликовано');
			$table->enum('transfer_ru', ['платный', 'бесплатный'])->default('платный');
			$table->enum('transfer_en', ['paid', 'free'])->default('paid');
			$table->enum('internet_ru', ['бесплатный'])->default('бесплатный');
			$table->enum('internet_en', ['free'])->default('free');
			$table->enum('parking_ru',  ['платный', 'платный (частный)', 'платный (общественный)'])->default('платный');
			$table->enum('parking_en',  ['paid', 'paid (private)', 'paid (public)'])->default('paid');
			$table->enum('country_ru',  ['Черногория', 'Хорватия'])->default('Черногория');
			$table->enum('country_en',  ['Montenegro', 'Croatia'])->default('Montenegro');
			$table->enum('area_ru',     ['Будванская ривьера', 'Бока-Которский залив', 'Барская ривьера'])->default('Будванская ривьера');
			$table->enum('area_en',     ['Budva Riviera', 'Boka Kotorska Bay', 'Bar Riviera'])->default('Budva Riviera');
			
			$table->string('name')->unique();
			$table->string('subname_ru')->nullable();
			$table->string('subname_en')->nullable();
		    $table->string('city_ru')->default('Будва');
			$table->string('city_en')->default('Budva');
			$table->string('view_ru')->default('на море');
			$table->string('view_en')->default('sea');

			$table->integer('square')->nullable();
			$table->tinyInteger('bedrooms')->nullable();
			$table->tinyInteger('capacity')->nullable();
			$table->integer('dist_sea')->nullable();
			$table->integer('dist_tivat')->nullable();
			$table->integer('dist_podg')->nullable();
			$table->float('booking_mark', 2, 1)->default(0.0);

			$table->text('description_ru');
			$table->text('description_en');
			$table->text('feedback');
			$table->text('map_html')->nullable();
			
			$table->integer('price')->nullable();
			$table->integer('price_line_through')->nullable();
			$table->integer('price_jan')->nullable();
			$table->integer('price_feb')->nullable();
			$table->integer('price_mar')->nullable();
			$table->integer('price_apr')->nullable();
			$table->integer('price_may')->nullable();
			$table->integer('price_jun')->nullable();
			$table->integer('price_jul')->nullable();
			$table->integer('price_aug')->nullable();
			$table->integer('price_sep')->nullable();
			$table->integer('price_oct')->nullable();
			$table->integer('price_nov')->nullable();
			$table->integer('price_dec')->nullable();
			$table->string('price_oct_apr_ru')->nullable();
			$table->string('price_oct_apr_en')->nullable();			
			$table->integer('discount')->default(0);
			
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('realties');
	}

}
