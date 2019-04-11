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

//Route::get('/test', "TestController");

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



Route::get('/', 'IndexController')->name('mainPage');

Route::get('/villas', 'RealtiesController');

Route::get('/apartments', 'RealtiesController');

Route::get('/feedbacks', 'FeedbacksController');

Route::get('/contact', 'ContactController');

Route::get('/realty/{id}', 'RealtyController')->name('realtyPage');

Route::get('/realties-data', 'RealtiesDataController');

Route::get('/feedbacks-data', 'FeedbacksDataController');









Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
