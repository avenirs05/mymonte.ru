<?php

namespace App\Http\Controllers\Admin;

//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use App\Realty;

class RealtyDeleteController extends Controller
{
	public function index ($realty_id) 
	{
		$realty = Realty::find($realty_id);
		
		// Удаляем картинки на сервере 
		foreach ($realty->images as $image) {
			unlink(storage_path('app/public/') . $image->path);
		}
		
		// Удаляем привязанные картинки
		$realty->images()->delete();
		
		// Удаляем объект
		$realty->delete();
		
		return 'deleted';
	}
    
}
