<?php

namespace App\Http\Controllers;

use Lang;
use App\Content;
use App\Realty;
use Illuminate\Http\Request;


class RealtiesController extends Controller
{
    public function __invoke(Request $request) 
	{
		$per_page = 2;
		$locale = app()->getLocale();
		$content = Content::select('phone_main')->where('lang', $locale)->get()->toArray()[0];
		
		$realty_type = self::realtyType($request);
		
		$title = Lang::get("text.menu." . $request->path());		
	
		$realties = Realty::with(array(
						'images' => function($query) {
							$query->where('type', 'primary');
						}))
						->where('type', $realty_type)						
						->paginate($per_page);	
		
		$data = [
			'title' => $title,
			'phone_main' => $content['phone_main'],
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
