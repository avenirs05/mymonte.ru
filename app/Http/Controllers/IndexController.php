<?php

namespace App\Http\Controllers;

use Lang;
use App\City;
use App\Country;
use App\Feedback;
use App\Img;
use App\Realty;
use App\Content;
use App\Parameter;

//use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke() 
	{
		$title = Lang::get('text.title_tag.home');
		$locale = app()->getLocale();		
		$content = Content::where('lang', $locale)->get()->toArray()[0];
		$phone_main = Parameter::where('param', 'phone_main')->get()->toArray()[0]['value'];
		
		$data = [
			'title'				   => $title,		
			'locale'			   => $locale,	
			'phone_main'		   => $phone_main,
			'header_main_screen'   => $content['header_main_screen'],	
			'header_main_content'  => $content['header_main_content'],
			'areas'				   => $content['areas'],
			'questions'			   => $content['questions'],
			'products'			   => $content['products'],							
			'contact_page'		   => $content['contact_page'],			
		];		
	
		return view('index', $data);
	}
}
