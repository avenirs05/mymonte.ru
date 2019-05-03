<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Realty;
use Lang;


class RealtiesDataController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $locale = app()->getLocale();		

		$realties = Realty::with(array('images' => function($query) {
						$query->where('type', 'primary');
		}))
			->where('category', $request->category_of_realty)
			->where('visibility', 'опубликовано')					
			->paginate($request->per_page, ['*'], 'page', $request->page)->toJson();
						
		
		return $realties;
	}

}
