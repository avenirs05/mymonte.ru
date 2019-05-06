<?php

namespace App\Http\Controllers;

use Lang;

use App\Content;
use App\Parameter;
use App\Language;

//use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke() 
	{
		$title = Lang::get('text.title_tag.home');
		$locale = app()->getLocale();		
		
		$phone_main = Parameter::where('param', 'phone_main')->get()->toArray()[0]['value'];		
		$phone_main_2 = Parameter::where('param', 'phone_main_2')->get()->toArray()[0]['value'];		
		
		$language = Language::where('code', $locale)->first();	
		
		$header_main_screen = Content::where('language_id', $language->id)
						             ->where('type', 'header_main_screen')
									 ->first();	
		
		$header_main_content = Content::where('language_id', $language->id)
									  ->where('type', 'header_main_content')
									  ->first();
		
		$header_areas = Content::where('language_id', $language->id)
				->where('type', 'header_areas')
				->first();

		$areas = Content::where('language_id', $language->id)
				->where('type', 'areas')
				->get()
				->toJson();
		
		$questions = Content::where('language_id', $language->id)
							->where('type', 'questions')
							->first();

		$data = [
			'title'				   => $title,		
			'locale'			   => $locale,	
			'phone_main'		   => $phone_main,		
			'phone_main_2'		   => $phone_main_2,		
			'header_main_screen'   => $header_main_screen->text,	
			'header_main_content'  => $header_main_content->text,
			'header_areas'         => $header_areas->text,
			'areas'				   => $areas,
			'questions'			   => $questions->text,
		];		
	
		return view('index', $data);
	}
}
