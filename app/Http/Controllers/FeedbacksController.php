<?php

namespace App\Http\Controllers;

use Lang;
use App\Content;
use App\Feedback;

//use Illuminate\Http\Request;
use App\Parameter;

class FeedbacksController extends Controller
{
    public function __invoke() 
    {
		$per_page = 2;
		$locale = app()->getLocale();
		$title = Lang::get('text.menu.feedbacks');
		$phone_main = Parameter::where('param', 'phone_main')->get()->toArray()[0]['value'];
		
		$feedbacks = Feedback::with('realty')->paginate($per_page);		
				
		$data = [
			'title' => $title,
			'phone_main' => $phone_main,
			'feedbacks' => $feedbacks->toJson(),
		];		
		

		return view('feedbacks', $data);
	}
}
