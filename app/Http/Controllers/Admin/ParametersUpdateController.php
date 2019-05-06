<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Parameter;

class ParametersUpdateController extends Controller
{
	public function index(Request $request) 
	{
		$data = [];
		
		$requestArr = $request->toArray;
		
		$phone_main = Parameter::where('param', 'phone_main')->first();			
		$phone_main->value = $request->phone_main;	
		$phone_main->save();
		
		$phone_main_2 = Parameter::where('param', 'phone_main_2')->first();
		$phone_main_2->value = $request->phone_main_2;
		$phone_main_2->save();

		$data['phone_main'] = $phone_main->value;
		$data['phone_main_2'] = $phone_main_2->value;
		
		return $data;
	}

}
