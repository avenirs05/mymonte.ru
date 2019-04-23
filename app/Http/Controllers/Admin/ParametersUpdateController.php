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
		
		$data['phone_main'] = $phone_main->value;
		
		return $data;
	}

}
