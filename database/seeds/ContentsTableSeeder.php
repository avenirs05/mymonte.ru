<?php

use Illuminate\Database\Seeder;

use App\Content;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Content::create(
			[
				'language_id'  => 1,
				'type'         => 'header_main_screen', 
				'name'         => 'header_main_screen', 
				'header'       => '',
				'text'         => 'Аренда вилл и апартаментов в Черногории без посредников'	
			]
		);			
        Content::create(
			[
				'language_id'  => 1,
				'type'	       => 'header_main_content',
				'name'	       => 'header_main_content',
				'header'	   => '',
				'text'		   => 'Отдых в Черногории в 2019 году. Часто задаваемые вопросы.'
			]
		);		
		Content::create(
			[
				'language_id'  => 1,
				'type'         => 'areas',
				'name'         => 'budva_riviera',
				'header'       => 'Будванская ривьера',
				'text'         => 'Текст про Будванская ривьера'
			]
		);				
		Content::create(
			[
				'language_id'  => 1,
				'type'		   => 'areas',
				'name'		   => 'boka_kotor_bay',
				'header'	   => 'Бока-Которский залив',
				'text'         => 'Текст про Бока-Которский'
			]
		);		
		Content::create(
			[
				'language_id'  => 1,
				'type'		   => 'areas',
				'name'		   => 'bar_riviera',
				'header'	   => 'Барская ривьера',
				'text'		   => 'Текст про Барская ривьера'
			]
		);
		Content::create(
			[
				'language_id'  => 1,
				'type'         => 'questions',
				'name'         => 'questions',
				'header'       => '',
				'text'         => 'Вопросы и ответы'
			]
		);		

		
		Content::create(
				[
					'language_id' => 2,
					'type' => 'header_main_screen',
					'name' => 'header_main_screen',
					'header' => '',
					'text' => 'en_Аренда вилл и апартаментов в Черногории без посредников'
				]
		);

		Content::create(
				[
					'language_id' => 2,
					'type' => 'header_main_content',
					'name' => 'header_main_content',
					'header' => '',
					'text' => 'en_Отдых в Черногории в 2019 году. Часто задаваемые вопросы.'
				]
		);

		Content::create(
				[
					'language_id' => 2,
					'type' => 'areas',
					'name' => 'budva_riviera',
					'header' => 'en_Будванская ривьера',
					'text' => 'en_Текст про Будванская ривьера'
				]
		);

		Content::create(
				[
					'language_id' => 2,
					'type' => 'areas',
					'header' => 'en_Бока-Которский залив',
					'name' => 'boka_kotor_bay',
					'text' => 'en_Текст про Бока-Которский'
				]
		);
		Content::create(
				[
					'language_id' => 2,
					'type' => 'areas',
					'name' => 'bar_riviera',
					'header' => 'en_Барская ривьера',
					'text' => 'en_Текст про Барская ривьера'
				]
		);
		Content::create(
				[
					'language_id' => 2,
					'type' => 'questions',
					'name' => 'questions',
					'header' => '',
					'text' => 'en_Вопросы и ответы'
				]
		);
	}
}
