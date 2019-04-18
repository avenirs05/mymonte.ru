<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Realty;
use App\Image;

class RealtiesIndexController extends Controller
{
	public function index(Request $request) 
	{
		$locale = app()->getLocale();

		$query = Realty::query();

		// Сортировка
		if (!is_null($request->sort_by)) {
			$query->orderBy($request->sort_by, $request->descending === "true" ? "asc" : "desc");
		}

		$realties = $query
				->with('images')
				->paginate($request->per_page, ['*'], 'page', $request->page)
				->toJson();


		return $realties;
	}
}
