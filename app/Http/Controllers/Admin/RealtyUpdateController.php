<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Realty;
use App\Image;

class RealtyUpdateController extends Controller
{
    public function index(Request $request) 
	{
		$requestArr = $request->toArray();

		// Список ключей secondaryImg_0, secondaryImg_1 и т.д.
		$secondaryImages = null;

		/**
		 * Если есть в массиве ключ от FormData с главной картинкой,
		 * то сохраняем файл. Потом удаляем из массива Request этот
		 * ключ, чтобы далее создать Image через массовое заполнение
		 * Картинки галереи приходят в формате secondaryImg_0, secondaryImg_1 
		 * и т.д. 
		 */
		if (isset($requestArr['primaryImg'])) {
			unset($requestArr['primaryImg']);
		}

		if (isset($requestArr['secondaryImg_0'])) {
			foreach ($requestArr as $key => $value) {
				if (preg_match('/secondaryImg/', $key)) {
					$secondaryImages[] = $key;
					unset($requestArr[$key]);
				}
			}
		}

		$realty = Realty::find($requestArr['id']);

		/**
		 * Если карточка изначально не дозаполнена, то незаполненные поля
		 * получают значение null (если nullable в mysql)
		 * Null приходит в строком виде, поэтому 'null'
		 */		
		foreach ($requestArr as $key => $value) {
			if ($key != 'images' && $key != 'id' && $value != 'null') {
				$realty->$key = $value;
			}
		}

		$realty->save();

		if (isset($request->primaryImg)) {
			self::delPrimaryImagesIfExists($realty->id); 

			Image::create(
			[
				'realty_id' => $realty->id,
				'type' => 'primary',
				'path' => $request->file('primaryImg')->store("uploads/$realty->id/primary", 'public')
			]);
		}

		/**
		 * Если есть secondaryImg_0, значит, имеются картинки галереи
		 */
		if (isset($request->secondaryImg_0)) {
			foreach ($secondaryImages as $key => $image) {
				Image::create(
				[
					'realty_id' => $realty->id,
					'type' => 'secondary',
					'path' => $request->file("secondaryImg_$key")->store("uploads/$realty->id/secondary", 'public')
				]);
			}
		}		
		
	}
	
	
	protected function delPrimaryImagesIfExists($realtyId) 
	{
		$images = Image::where('realty_id', $realtyId)->where('type', 'primary')->get();
		
		if ($images->isNotEmpty()) {
			foreach ($images as $image) {
				unlink(storage_path('app/public/') . $image->path);
				$image->delete();
			}
		}
	}
}
