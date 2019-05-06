<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Parameter;

class ParametersIndexController extends Controller
{
	public function index(Request $request) 
	{
		$data = [];
		
		$phone_main = Parameter::where('param', 'phone_main')->first()->toArray();
		$phone_main_2 = Parameter::where('param', 'phone_main_2')->first()->toArray();
		
		$data['phone_main'] = $phone_main;
		$data['phone_main_2'] = $phone_main_2;
		
		//dd($data);
		
		return $data;		
	}
}
