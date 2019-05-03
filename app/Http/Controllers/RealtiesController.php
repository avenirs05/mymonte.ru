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
		
		$realty_category = self::realtyCategory($request);		
	
		$title = Lang::get("text.menu.objects." . str_replace('-', '_', $request->path()) );		
	
		$realties = Realty::with(array('images' => function($query) {
			$query->where('type', 'primary');
		}))
			->where('category', $realty_category)
			->where('visibility', 'опубликовано')
			->paginate($per_page);	
		
		$data = [
			'title' => $title,
			'phone_main' => $phone_main,
			'realties' => $realties->toJson(),
		];
		
		
		return view('realties', $data);
	}
	
	
	protected static function realtyCategory(Request $request) 
	{
		switch ($request->path()) {
			case 'less-than-100':
				return 'less_than_100';
				break;
			case 'from-100-to-150':
				return 'from_100_to_150';
				break;
			case 'more-than-150':
				return 'more_than_150';
				break;
		}
	}
}
