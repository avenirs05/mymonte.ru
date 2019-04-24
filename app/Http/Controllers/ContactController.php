<?php

namespace App\Http\Controllers;

use Lang;
use App\Content;
use App\Parameter;
use App\Language;
//use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __invoke() 
	{
		$locale = app()->getLocale();
		$language = Language::where('code', $locale)->first();		
		$title = Lang::get('text.menu.contact');			
		
		$phone_main = Parameter::where('param', 'phone_main')->get()->toArray()[0]['value'];
		
		$contact_page = Content::where('language_id', $language->id)
								->where('type', 'contact_page')
								->first();

		$data = [
			'title' => $title,
			'phone_main' => $phone_main,
			'contact_page' => $contact_page->text,
		];

		return view('contact', $data);
	}
}
