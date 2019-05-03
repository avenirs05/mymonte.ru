<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Определение языка и установка его в сессию
 */
Route::get('locale/{locale}', function($locale) {
	Session::put('locale', $locale);
	return redirect()->back();
});


/**
 * Кэширование и выдача js файла локализации
 */
Route::get('/js/language/{locale}.js', function () {
	$locale = App::getLocale();
	$strings = Cache::rememberForever("$locale.js", function () use ($locale) {
				$files = glob(resource_path('lang/' . $locale . '/*.php'));
				$strings = [];

				foreach ($files as $file) {
					$name = basename($file, '.php');
					$strings[$name] = require $file;
				}

				return $strings;
			});

	header('Content-Type: text/javascript');
	echo('window.i18n = ' . json_encode($strings) . ';');
	exit();
})->name('assets.lang');


Auth::routes();

// Маршруты для клиентов-фронтенд
Route::get('/', 'IndexController')->name('mainPage');
Route::get('/villas', 'RealtiesController');
Route::get('/apartments', 'RealtiesController');

Route::get('/less-than-100', 'RealtiesController');
Route::get('/from-100-to-150', 'RealtiesController');
Route::get('/more-than-150', 'RealtiesController');

Route::get('/contact', 'ContactController');

Route::get('/realty/{id}', 'RealtyController')->name('realtyPage');
Route::get('/realties-data', 'RealtiesDataController');


// Админка
Route::group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
	Route::get('/', 'IndexController@index');		
	
	// Редактирование объектов недвижимости
	Route::get('/realties', 'RealtiesIndexController@index')->name('admin-realties-index');
	Route::post('/realty-add', 'RealtyAddController@index')->name('admin-realty-add');	
	Route::post('/realty-update', 'RealtyUpdateController@index')->name('admin-realty-update');	
	Route::delete('/realty-delete/{id}', 'RealtyDeleteController@index')->name('admin-realty-delete');
	Route::delete('/image-delete/{id}', 'ImageDeleteController@index')->name('admin-image-delete');
	
	// Редактирование текстового контента
	Route::get('/languages', 'LanguagesIndexController@index')->name('admin-languages-index');	
	Route::post('/language-update', 'LanguageUpdateController@index')->name('admin-language-update');
	Route::get('/parameters', 'ParametersIndexController@index')->name('admin-parameters-index');
	Route::post('/parameters-update', 'ParametersUpdateController@index')->name('admin-parameters-update');
	
});





