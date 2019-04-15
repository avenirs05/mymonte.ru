<?php

namespace App\Http\Controllers\Admin;

//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Realty;

class IndexController extends Controller
{
    /**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
//	public function __construct() {
//		$this->middleware('auth');
//	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index() {
		return view('admin.index');
	}

	public function getRealtyIdByName($name) {
		return Realty::where('name', $name)->first()->id;
	}
	
}
