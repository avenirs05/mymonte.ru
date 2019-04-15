<?php

namespace App\Http\Controllers;

use Lang;
use App\Content;
use App\Parameter;
//use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __invoke() 
	{
		$locale = app()->getLocale();
		$title = Lang::get('text.menu.contact');	
		$content = Content::where('lang', $locale)->get()->toArray()[0];
		$phone_main = Parameter::where('param', 'phone_main')->get()->toArray()[0]['value'];
		
		$data = [
			'title' => $title,
			'phone_main' => $phone_main,
			'contact_page' => $content['contact_page'],
		];

		return view('contact', $data);
	}
}
