<?php

namespace App\Http\Controllers;

use Lang;
use App\Content;
//use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __invoke() 
	{
		$locale = app()->getLocale();
		$title = Lang::get('text.menu.contact');	
		$content = Content::where('lang', $locale)->get()->toArray()[0];
	
		$data = [
			'title' => $title,
			'phone_main' => $content['phone_main'],
			'contact_page' => $content['contact_page'],
		];

		return view('contact', $data);
	}
}
