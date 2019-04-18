<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Realty;
use App\Image;

class RealtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
		
		$realty = Realty::create($requestArr);
		
		if (isset($request->primaryImg)) {
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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

		foreach ($requestArr as $key => $value) {
			if ($key != 'images' && $key != 'id') {
				$realty->$key = $value;
			}
		}

		$realty->save();

		if (isset($request->primaryImg)) {
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

		return 'ok';
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
