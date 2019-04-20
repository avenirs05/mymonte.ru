<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Parameter;
use App\Content;

class ContentsIndexController extends Controller
{
    public function index(Request $request) 
	{
		$contents = Content::all()->toJson();
		
		//dd($contents[0]->lang);
		
		return $contents;
	}
}
