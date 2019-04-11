<?php

use Illuminate\Database\Seeder;

use App\Image;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
		Image::create(
		[
			'realty_id' => 1,
			'type' => 'primary',
			'path' => '/images/upload/realties/Anthurium_I/01.jpg',
		]);
		
		Image::create(
		[
			'realty_id' => 1,
			'type' => 'secondary',
			'path' => '/images/upload/realties/Anthurium_I/02.jpg',
		]);
		
		Image::create(
		[
			'realty_id' => 1,
			'type' => 'secondary',
			'path' => '/images/upload/realties/Anthurium_I/03.jpg',
		]);
		
		
		
		
		Image::create(
		[
			'realty_id' => 2,
			'type' => 'primary',
			'path' => '/images/upload/realties/Begonia/01.jpg',
		]);

		Image::create(
		[
			'realty_id' => 2,
			'type' => 'secondary',
			'path' => '/images/upload/realties/Begonia/02.jpg',
		]);

		Image::create(
		[
			'realty_id' => 2,
			'type' => 'secondary',
			'path' => '/images/upload/realties/Begonia/03.jpg',
		]);
		
		
		
		
		Image::create(
		[
			'realty_id' => 3,
			'type' => 'primary',
			'path' => '/images/upload/realties/Heart_Of_Budva/01.jpg',
		]);

		Image::create(
		[
			'realty_id' => 3,
			'type' => 'secondary',
			'path' => '/images/upload/realties/Heart_Of_Budva/02.jpg',
		]);

		Image::create(
		[
			'realty_id' => 3,
			'type' => 'secondary',
			'path' => '/images/upload/realties/Heart_Of_Budva/03.jpg',
		]);
		
		
		
		
		Image::create(
		[
			'realty_id' => 4,
			'type' => 'primary',
			'path' => '/images/upload/realties/Astra_I/01.jpg',
		]);

		Image::create(
		[
			'realty_id' => 4,
			'type' => 'secondary',
			'path' => '/images/upload/realties/Astra_I/02.jpg',
		]);

		Image::create(
		[
			'realty_id' => 4,
			'type' => 'secondary',
			'path' => '/images/upload/realties/Astra_I/03.jpg',
		]);
		
		
		Image::create(
				[
					'realty_id' => 5,
					'type' => 'primary',
					'path' => '/images/upload/realties/Astra_I/01.jpg',
		]);

		Image::create(
				[
					'realty_id' => 5,
					'type' => 'secondary',
					'path' => '/images/upload/realties/Astra_I/02.jpg',
		]);

		Image::create(
				[
					'realty_id' => 5,
					'type' => 'secondary',
					'path' => '/images/upload/realties/Astra_I/03.jpg',
		]);
		
		
		Image::create(
				[
					'realty_id' => 6,
					'type' => 'primary',
					'path' => '/images/upload/realties/Astra_I/01.jpg',
		]);

		Image::create(
				[
					'realty_id' => 6,
					'type' => 'secondary',
					'path' => '/images/upload/realties/Astra_I/02.jpg',
		]);

		Image::create(
				[
					'realty_id' => 6,
					'type' => 'secondary',
					'path' => '/images/upload/realties/Astra_I/03.jpg',
		]);
		
		
		Image::create(
				[
					'realty_id' => 7,
					'type' => 'primary',
					'path' => '/images/upload/realties/Astra_I/01.jpg',
		]);

		Image::create(
				[
					'realty_id' => 7,
					'type' => 'secondary',
					'path' => '/images/upload/realties/Astra_I/02.jpg',
		]);

		Image::create(
				[
					'realty_id' => 7,
					'type' => 'secondary',
					'path' => '/images/upload/realties/Astra_I/03.jpg',
		]);
		
		
		Image::create(
		[
					'realty_id' => 8,
					'type' => 'primary',
					'path' => '/images/upload/realties/Astra_I/01.jpg',
		]);

		Image::create(
				[
					'realty_id' => 8,
					'type' => 'secondary',
					'path' => '/images/upload/realties/Astra_I/02.jpg',
		]);

		Image::create(
				[
					'realty_id' => 8,
					'type' => 'secondary',
					'path' => '/images/upload/realties/Astra_I/03.jpg',
		]);
		
		
		Image::create(
				[
					'realty_id' => 9,
					'type' => 'primary',
					'path' => '/images/upload/realties/Astra_I/01.jpg',
		]);

		Image::create(
				[
					'realty_id' => 9,
					'type' => 'secondary',
					'path' => '/images/upload/realties/Astra_I/02.jpg',
		]);

		Image::create(
				[
					'realty_id' => 9,
					'type' => 'secondary',
					'path' => '/images/upload/realties/Astra_I/03.jpg',
		]);
		
		
		Image::create(
				[
					'realty_id' => 10,
					'type' => 'primary',
					'path' => '/images/upload/realties/Astra_I/01.jpg',
		]);

		Image::create(
				[
					'realty_id' => 10,
					'type' => 'secondary',
					'path' => '/images/upload/realties/Astra_I/02.jpg',
		]);

		Image::create(
				[
					'realty_id' => 10,
					'type' => 'secondary',
					'path' => '/images/upload/realties/Astra_I/03.jpg',
		]);
	}
}
