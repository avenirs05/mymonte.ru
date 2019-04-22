<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Content;


class ContentUpdateController extends Controller
{
        public function index(Request $request) 
	{
		$requestArr = $request->toArray();
		
		//return $requestArr;		
		
		$content = Content::find($requestArr['id']);
		
		//return $content->header_main_screen;	
		
//
		foreach ($requestArr as $key => $value) {
				$content->$key = $value;			
		}
//
		$content->save();

			
		// Возвращаем обновленный объект		
//		$arrayRealty = $realty->toArray();
//		unset($arrayRealty['created_at']);
//		unset($arrayRealty['updated_at']);
//		return json_encode($arrayRealty);
//
//		return 'ok';
	}

}
