<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealtiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realties', function (Blueprint $table) {
            $table->increments('id');
			
			$table->string('name')->unique();			
	
			$table->enum('type', ['villa', 'apartment'])->default('apartment');
			$table->enum('type_ru', ['вилла', 'апартамент'])->default('апартамент');
			$table->enum('type_en', ['villa', 'apartment'])->default('apartment');
			
			$table->string('subname_ru');
			$table->string('subname_en');
			
			$table->integer('square');
			
			$table->enum('view_ru', ['на море', 'на море и горы', 'на горы', 'на окрестности и горы'])->default('на море');
			$table->enum('view_en', ['sea', 'sea and mountains', 'mountains', 'surroundings and mountains'])->default('sea');
			
			$table->tinyInteger('bedrooms');
			$table->tinyInteger('capacity');
			$table->integer('dist_sea');
			$table->integer('dist_tivat');
			$table->integer('dist_podg');
			
			$table->enum('transfer_ru', ['платный', 'бесплатный'])->default('платный');
			$table->enum('transfer_en', ['paid', 'free'])->default('paid');		

			$table->enum('internet_ru', ['wi-fi'])->default('wi-fi');
			$table->enum('internet_en', ['wi-fi'])->default('wi-fi');			
		
			$table->enum('parking_ru', ['платный', 'платный (частный)', 'платный (общественный)'])->default('платный');
			$table->enum('parking_en', ['paid', 'paid (private)', 'paid (public)'])->default('paid');
			
			$table->float('booking_mark', 2, 1)->default(0.0);
			
			$table->text('description_ru');
			$table->text('description_en');
			
			$table->string('country_ru', 100)->default('Черногория');
			$table->string('country_en', 100)->default('Montenegro');
			
			$table->enum('area_ru', [
				'Будванская ривьера', 
				'Бока-Которский залив', 
				'Барская ривьера'
			])->default('Будванская ривьера');
			
			$table->enum('area_en', [
				'Budva Riviera',
				'Boka Kotorska Bay',
				'Bar Riviera'
			])->default('Budva Riviera');
			
			$table->string('city_ru', 100)->default('Будва');
			$table->string('city_en', 100)->default('Budva');
			
			$table->text('map_html');

			$table->integer('price');			
			$table->integer('price_jan');
			$table->integer('price_feb');
			$table->integer('price_mar');
			$table->integer('price_apr');
			$table->integer('price_may');
			$table->integer('price_jun');
			$table->integer('price_jul');
			$table->integer('price_aug');
			$table->integer('price_sep');
			$table->integer('price_oct');
			$table->integer('price_nov');
			$table->integer('price_dec');
			$table->string('price_oct_apr_ru');
			$table->string('price_oct_apr_en');
			
			
			$table->integer('price_line_through');
			$table->integer('discount')->default(0);

			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realties');
    }
}
