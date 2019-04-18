<?php

namespace App\Http\Controllers;

use Lang;
use App\Realty;
use App\Parameter;
use Illuminate\Http\Request;


class RealtiesController extends Controller
{
    public function __invoke(Request $request) 
	{
		
		$per_page = 5;
		$locale = app()->getLocale();
		
		$phone_main = Parameter::where('param', 'phone_main')->get()->toArray()[0]['value'];
		
		$realty_type = self::realtyType($request);
		
		$title = Lang::get("text.menu." . $request->path());		
	
		$realties = Realty::with(array(
						'images' => function($query) {
							$query->where('type', 'primary');
		}))
			->where('type', $realty_type)
			->where('visibility', 'опубликовано')
			->paginate($per_page);	
		
		$data = [
			'title' => $title,
			'phone_main' => $phone_main,
			'realties' => $realties->toJson(),
		];
		
		
		return view('realties', $data);
	}
	
	
	protected static function realtyType(Request $request) 
	{
		switch ($request->path()) {
			case 'villas':
				return 'villa';
				break;
			case 'apartments':
				return 'apartment';
				break;
		}			
	}
}
