<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Parameter;
use App\Language;

class LanguagesIndexController extends Controller
{
    public function index(Request $request) 
	{

		$query = Language::query();

		// Сортировка
		if (!is_null($request->sort_by)) {
			$query->orderBy($request->sort_by, $request->descending === "true" ? "asc" : "desc");
		}

		$languages = $query
				->with('contents')
				->paginate($request->per_page, ['*'], 'page', $request->page)
				->toJson();
		

		return $languages;	

	}
}
