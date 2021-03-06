<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lang;
use App\Parameter;

class ThankYouController extends Controller
{
    public function __invoke(Request $request) {
		$title = Lang::get('text.title_tag.thank_you');
		$phone_main = Parameter::where('param', 'phone_main')->get()->toArray()[0]['value'];
		
		$subject = "Новое сообщение с сайта mymonte.ru";
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

		$name = isset($request->name) ? $request->name : 'Не заполнено';
		$phone = isset($request->phone) ? $request->phone : 'Не заполнено';
		$email = isset($request->email) ? $request->email : 'Не заполнено';
		$budget = isset($request->budget) ? $request->budget : 'Не заполнено';		
		
		$message = '
			<html>
				<head>
					<title>Новое сообщение с сайта</title>
				</head>
				<body style="font-family:Verdana,sans-serif;">
					<p><b>Имя:</b> "' . $name . '"</p>
					<p><b>Телефон:</b> "' . $phone . '"</p>
					<p><b>Email</b> "' . $email . '"</p>
					<p><b>Бюджет</b> "' . $budget . '"</p>
				</body>
			</html>
		';
		
		mail("domosed365365@gmail.com", $subject, $message, $headers);		
	
		$data = [
			'title' => $title,
			'phone_main' => $phone_main,
		];

		return view('thank-you', $data);
	}

}
