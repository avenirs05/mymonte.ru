<?php

use Illuminate\Database\Seeder;

use App\Parameter;

class ParametersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Parameter::create(
		[
			'param' => 'phone_main',
			'value' => '+382 68 089 888',
		]);
	}
}
