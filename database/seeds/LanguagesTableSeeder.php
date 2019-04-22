<?php

use Illuminate\Database\Seeder;
use App\Language;


class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create(
			[
				'id' => 1,
				'code' => 'ru',
				'name' => 'русский'
			]
		);
		
		Language::create(
			[
				'id' => 2,
				'code' => 'en',
				'name' => 'English'
			]
		);
	}
}
