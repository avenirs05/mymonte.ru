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
				'name' => 'Русский'
			]
		);
		
		Language::create(
			[
				'id' => 2,
				'code' => 'en',
				'name' => 'English'
			]
		);
		
		Language::create(
				[
					'id' => 3,
					'code' => 'de',
					'name' => 'Немецкий'
				]
		);
		
		Language::create(
				[
					'id' => 4,
					'code' => 'fr',
					'name' => 'Французский'
				]
		);
		
		Language::create(
				[
					'id' => 5,
					'code' => 'it',
					'name' => 'Итальянский'
				]
		);
		
		Language::create(
				[
					'id' => 6,
					'code' => 'es',
					'name' => 'Испанский'
				]
		);
		
		Language::create(
				[
					'id' => 7,
					'code' => 'sr',
					'name' => 'Сербский'
				]
		);
		
		Language::create(
				[
					'id' => 8,
					'code' => 'tr',
					'name' => 'Турецкий'
				]
		);
		
		Language::create(
				[
					'id' => 9,
					'code' => 'pl',
					'name' => 'Польский'
				]
		);
		
		Language::create(
				[
					'id' => 10,
					'code' => 'ro',
					'name' => 'Румынский'
				]
		);
	}
}
