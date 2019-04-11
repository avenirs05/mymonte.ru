text<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
			
			$table->string('lang', 10);	
			$table->string('header_main_screen');
			$table->string('header_main_content');
			$table->string('phone_main', 50);
			$table->text('areas');
			$table->text('questions');
			$table->text('products');
			$table->text('contact_page');
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
        Schema::dropIfExists('contents');
    }
}
