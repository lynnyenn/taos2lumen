<?php

namespace App\Http\Controllers;
use App\Wxtd;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller;

class ChartsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	/** @var DatabaseManager $db */
	public function index() {
		//$db = app('db');
		//$chartsDatabase = $db->connection('charts');
		$maxid = Wxtd::max('id');
		//$results = app('db')->select("SELECT * FROM users");
		//$wxtd = $chartsDatabase->select("SELECT no,timestamp,temperature,humidity FROM wxtd WHERE no='1' LIMIT 50");
		return View()->make('frontend.charts')->with('maxid', $maxid);
		//$wxtd = Wxtd::all();
		//return view('frontend.charts', compact('atdata'));
	}
	public function show($id) {
		$array_name = array('timestamp', 'temperature', 'humidity', 'pressure', 'wind_direction', 'wind_speed', 'wind_speed_5', 'wind_speed_10', 'wind_speed_20', 'wind_gust_5', 'wind_gust_10', 'wind_gust_20', 'rainfall', 'rainfall_time', 'rain_intensity', 'hail', 'hail_time', 'hail_intensity', 'heater_temp', 'heater_voltage', 'supply_voltage', 'reference_voltage');
		//$array_name = array('timestamp', 'temperature', 'humidity', 'rainfall');
		$atdata = Wxtd::where('no', '=', 1)
			->select($array_name)
			->get();
		//var_dump($atdata);
		//return Response()->json($atdata);
		//output tsv type
		//return view('frontend.charttsv', compact('atdata', 'array_name'));
		return view('frontend.charts', compact('atdata', 'array_name'));
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}
}
