<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __invoke() 
	{
		$headers = 'Content-type: text/html; charset=utf-8' . "\r\n";
		$to = 'domosed365365@gmail.com';
		$subject = "Test msg";

		if (isset($_GET['test'])) {
			$message = '<html><head><title></title></head><body><br>' .
					'Имя: ' . $_GET['test'] . '<br>' .
					'</body></html>';

			mail($to, $subject, $message, $headers);
			
		}
		dd($_GET['test']);
		//return view('test');
	}
}
