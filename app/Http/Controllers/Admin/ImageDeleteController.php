<?php

namespace App\Http\Controllers\Admin;

//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;

class ImageDeleteController extends Controller
{
    public function index($id) 
	{
		$image = Image::find($id);

		unlink(storage_path('app/public/') . $image->path);

		$image->delete();

		return 'deleted';
	}
}
