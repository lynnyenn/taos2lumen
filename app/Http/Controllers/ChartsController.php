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
	public $array_name = array('temperature', 'humidity', 'pressure', 'wind_direction', 'wind_speed', 'wind_speed_5', 'wind_speed_10', 'wind_speed_20', 'wind_gust_5', 'wind_gust_10', 'wind_gust_20', 'rainfall', 'rainfall_time', 'rain_intensity', 'hail', 'hail_time', 'hail_intensity', 'heater_temp', 'heater_voltage', 'supply_voltage', 'reference_voltage');
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
		//$array_name = array('timestamp', 'temperature', 'humidity', 'rainfall');
		$atdata = Wxtd::where('no', '=', $id)
			->select($this->array_name)
			->orderBy('id')
			->get();
		//var_dump($atdata);
		//return Response()->json($atdata);
		//output tsv type
		return view('frontend.charttsv', compact('atdata', 'array_name'));
		//return view('frontend.charts', compact('atdata', 'array_name'));
	}
	public function overview() {
		/*
			$array_name = array('timestamp', 'temperature', 'humidity', 'pressure', 'wind_direction', 'wind_speed', 'wind_speed_5', 'wind_speed_10', 'wind_speed_20', 'wind_gust_5', 'wind_gust_10', 'wind_gust_20', 'rainfall', 'rainfall_time', 'rain_intensity', 'hail', 'hail_time', 'hail_intensity', 'heater_temp', 'heater_voltage', 'supply_voltage', 'reference_voltage');
			//$array_name = array('timestamp', 'temperature', 'humidity', 'rainfall');
			$atdata = Wxtd::where('no', '=', 1)
				->select($array_name)
		*/
		//var_dump($atdata);
		//return Response()->json($atdata);
		//output tsv type
		//return view('frontend.charttsv', compact('atdata', 'array_name'));
		return view('frontend.charts.overview');
	}
	public function wind() {
		return view('frontend.charts.wind');
	}
	public function live() {
		return view('frontend.charts.live');
	}
	public function jsonlive() {
		$maxtimestamp = Wxtd::max('timestamp');
		$array_max = $this->array_name;
		$array_min = $this->array_name;
		array_walk($array_max, function (&$value, $key) {$value = "MAX(" . $value . ") as " . $value;});
		array_walk($array_min, function (&$value, $key) {$value = "MIN(" . $value . ") as " . $value;});
		$db = app('db');
		$chartsDatabase = $db->connection('charts');
		$max = $chartsDatabase->select("SELECT timestamp," . implode(",", $array_max) . " FROM wxtd WHERE timestamp =" . $maxtimestamp . " GROUP BY timestamp");
		$min = $chartsDatabase->select("SELECT timestamp," . implode(",", $array_min) . " FROM wxtd WHERE timestamp =" . $maxtimestamp . " GROUP BY timestamp");

		//var_dump($array_name);
		//$atdata = Wxtd::where('timestamp', '=', $maxtimestamp)
		//->select($array_name)
		//->orderBy('id')
		//->max('temperature')
		//->min('humidity');
		//var_dump($atdata);
		return Response()->json(compact('max', 'min'));
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
