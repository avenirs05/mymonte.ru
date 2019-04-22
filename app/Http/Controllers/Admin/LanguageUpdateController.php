<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Content;


class LanguageUpdateController extends Controller
{
    public function index(Request $request) 
	{
		$requestArrContents = $request->toArray()['contents'];	
	
		// Обновляем записи в бд
		foreach ($requestArrContents as $index => $contentFrontend) {
			$contentInDb = Content::find($contentFrontend['id']);
			
			foreach ($contentFrontend as $key => $value) {
					 $contentInDb->$key = $value;
			}
			
			$contentInDb->save();			
		}

		return 'ok';
	}

}
