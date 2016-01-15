<?php
/** @var DatabaseManager $db */
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
 */
//$app->get('/', ['uses' => 'HomeController@index', 'lang' => 'name']);
/*
for key
 */
$app->get('/key', function () {
	return str_random(32);
});

//work
//app('translator')->locale()
//$locale = app('translator')->getLocale();
$urllang = explode('/', $_SERVER['REQUEST_URI'])[1];
if ($urllang == 'tw') {
	app('translator')->setLocale('tw');
	$locate = 'tw/';
} else {
	app('translator')->setLocale('en');
	$locate = '/';
}
$app->get($locate, [
	'as' => 'path', 'uses' => 'HomeController@index',
]);

$app->get($locate . 'about', 'AboutController@index');
$app->get($locate . 'news', 'NewsController@index');
$app->get($locate . 'news/{id}', 'NewsController@show');
$app->get($locate . 'projects', 'ProjectsController@index');
$app->get($locate . 'gallery', 'GalleryController@index');
$app->get($locate . 'publications', 'PublicationsController@index');

$app->get($locate . 'charts/overview', 'ChartsController@overview');
$app->get($locate . 'charts/live', 'ChartsController@live');
$app->get($locate . 'charts/wind', 'ChartsController@wind');
$app->get($locate . 'charts/jsonlive', 'ChartsController@jsonlive');
$app->get($locate . 'charts/{id}', 'ChartsController@show');
$app->get($locate . 'charts', 'ChartsController@index');
/*
$app->get('/charts/{type}', function ($type) {
$atdata = Wxtd::where('no', '=', 1)
->select('timestamp', 'temperature', 'humidity')
->get();
return Response()->json($atdata);
});
$app->get('/charts', function () {
$maxid = Wxtd::max('id');
return View()->make('frontend.charts')->with('maxid', $maxid);
});
 */