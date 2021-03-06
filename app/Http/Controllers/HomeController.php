<?php
namespace App\Http\Controllers;

use App\News;
//use Request;
//use Carbon\Carbon;
//use App\Http\Requests;
use Laravel\Lumen\Routing\Controller;

//use App\Http\Requests\NewsRequest;

class HomeController extends Controller {

	/*
		    |--------------------------------------------------------------------------
		    | Home Controller
		    |--------------------------------------------------------------------------
		    |
		    | This controller renders your application's "dashboard" for users that
		    | are authenticated. Of course, you are free to change or remove the
		    | controller as you wish. It is just here to get your app started!
		    |
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		//$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index() {
		$newslist = News::latest('published_at')->published()->paginate(10);
		//var_dump($newslist);
		//var_dump(app('translator')->get());
		return view('frontend.home', compact('newslist'));
		//return view('frontend.home');
		//return \Auth::user();
	}

}
