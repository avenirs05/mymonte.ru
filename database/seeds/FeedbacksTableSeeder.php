<?php

use Illuminate\Database\Seeder;

use App\Feedback;

class FeedbacksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
		Feedback::create(
		[
			'realty_id' => 1,
			'header' => 'header for realty_id 1',
			'text' => 'text for realty_id 1',
		]);
		
		Feedback::create(
		[
			'realty_id' => 1,
			'header' => 'header for realty_id 1',
			'text' => 'text for realty_id 1',
		]);
		
		
		
		
		Feedback::create(
		[
			'realty_id' => 3,
			'header' => 'header for realty_id 3',
			'text' => 'text for realty_id 3',
		]);
		
		
		Feedback::create(
		[
			'realty_id' => 3,
			'header' => 'header for realty_id 3',
			'text' => 'text for realty_id 3',
		]);
		
		Feedback::create(
		[
			'realty_id' => 3,
			'header' => 'header for realty_id 3',
			'text' => 'text for realty_id 3',
		]);
		
		
		
		
		Feedback::create(
		[
			'realty_id' => 2,
			'header' => 'header for realty_id 2',
			'text' => 'text for realty_id 2',
		]);
		
		Feedback::create(
		[
			'realty_id' => 2,
			'header' => 'header for realty_id 2',
			'text' => 'text for realty_id 2',
		]);
	}
}
