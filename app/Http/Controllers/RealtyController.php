<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Content;
use App\Realty;
use App\Feedback;


class RealtyController extends Controller
{
	public function __invoke($id) 
	{
		$locale = app()->getLocale();
		
		$content = Content::select('phone_main')
					->where('lang', $locale)
					->get()
					->toArray()[0];		
	
		$realty = Realty::with('images')->where('id', $id)->first();					

		$feedbacks = Feedback::where('realty_id', $id)->get();
		
		/**
		 * Установка title страницы
		 */		
		$type = "type_$locale";	
		$title = $realty->name . ' ' . $realty->$type;
		
		$data = [
			'title'      => $title,
			'phone_main' => $content['phone_main'],
			'realty'     => $realty->toJson(),
			'feedbacks'  => $feedbacks->toJson()
		];			
		
		
		return view('realty', $data);
	}
}
