<?php

namespace App\Http\Controllers;

use Lang;
use App\Content;
use App\Feedback;

//use Illuminate\Http\Request;

class FeedbacksController extends Controller
{
    public function __invoke() 
    {
		$per_page = 2;
		$locale = app()->getLocale();
		$title = Lang::get('text.menu.feedbacks');
		$content = Content::where('lang', $locale)->get()->toArray()[0];
		
		$feedbacks = Feedback::with('realty')->paginate($per_page);		
		
		
		
		$data = [
			'title' => $title,
			'phone_main' => $content['phone_main'],
			'feedbacks' => $feedbacks->toJson(),
		];		
		

		return view('feedbacks', $data);
	}
}
