<?php
use  App\Http\Controllers;
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
/*
$app->get('/', function () use ($app) {
    return $app->welcome();
});

//$app->get('/', 'HomeController@index');

$app->group([
    'prefix'     => Localization::setLocale(),
    //'prefix'     => app('Localization')::setLocale(),
    'middleware' => [
        'localization-session-redirect',
        'localization-redirect',
         ],
    ], function($app)
    {
        $app->get('/', function() {
            return view('HomeController@index');
        });

        $app->get('user/profile', function() {
            // Uses Foo & Bar Middleware
    });
});
/*
$app->get('/tw', function () use ($app) {
    app('translator')->setLocale('tw');

    //return $app->welcome();
});

//$app->get('/{locale}', 'HomeController@index');
$app->get('/', function () use ($app) {
    return $app->welcome();
});
*/
//$app->get('/', ['uses' => 'HomeController@index', 'lang' => 'name']);

/*
for key

$app->get('/key', function() {
    return str_random(32);
});
*/

//work
//app('translator')->locale()
//$locale = app('translator')->getLocale();
if($_SERVER['REQUEST_URI'] == '/tw'){
    app('translator')->setLocale('tw');
    $locale = 'tw';
}else{
    app('translator')->setLocale('en');
    $locale = '/';
}
$app->get($locale, [
    'as' => 'home', 'uses' => 'HomeController@index'
]);
$app->get($locale.'news', [
    'as' => 'news', 'uses' => 'NewsController@index'
]);

/*
$app->group([
    'prefix' => '',
    //'middleware' => [ 'local_session','local_redirect'],
    ], function($app)
    {
        $app->get('/', 'App\Http\Controllers\HomeController@index');
        $app->get('/news', 'App\Http\Controllers\HomeController@index');

        $app->get('user/profile', function() {
            // Uses Foo & Bar Middleware
    });
});
*/