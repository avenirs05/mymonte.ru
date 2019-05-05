<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lang;
use App\Parameter;

class ThankYouController extends Controller
{
    public function __invoke(Request $request) {
		$title = Lang::get('text.menu.contact');
		$phone_main = Parameter::where('param', 'phone_main')->get()->toArray()[0]['value'];
//		dd($request->toArray());
		
		$data = [
			'title' => $title,
			'phone_main' => $phone_main,
		];

		return view('thank-you', $data);
	}

}
