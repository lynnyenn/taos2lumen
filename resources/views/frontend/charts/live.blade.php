@extends('includes.base')
@section('title')
    {{ trans('base.charts') }}
@stop
@section('css')
<link rel="stylesheet" href="/css/charts.css">
<link rel="stylesheet" href="/css/grid.css">
<link rel="stylesheet" href="/weather/css/weather-icons.min.css">
<style type="text/css">
  .column{
    padding: 0px !important;
  }
  .showbox{
    background-color: #e0e0e0;
    height: 150px;
    border:#f5f5f5 5px solid;
  }

</style>
@stop
@section('content')
    <div class="row">
<?php
$array_name = array('temperature', 'humidity', 'pressure', 'wind_direction', 'wind_speed', 'wind_speed_5', 'wind_speed_10', 'wind_speed_20', 'wind_gust_5', 'wind_gust_10', 'wind_gust_20', 'rainfall', 'rainfall_time', 'rain_intensity', 'hail', 'hail_time', 'hail_intensity', 'heater_temp', 'heater_voltage', 'supply_voltage', 'reference_voltage');
?>
    @foreach($array_name as $name)
      <div class="col s6 m3 l2 showbox">
        {{ $name }}
        <div id="{{ $name }}_max"></div>
        <div id="{{ $name }}_min"></div>
      </div>
    @endforeach
    </div>
@stop
@section('js')
<script src="http://d3js.org/d3.v3.js"></script>
<!-- <script src="/js/charts/live.js"></script> -->
<script type="text/javascript">
$(document).ready(function(){
  function updatedata(){
    //var obj_max = {};
    //var array_data = new Array();
    $.getJSON("/charts/jsonlive",function(result){
      $.each(result, function(i, values){
        for(var key in result.max[0]){
          $("#"+key+"_max").html(result.max[0][key]);
        }
        for(var key in result.min[0]){
          $("#"+key+"_min").html(result.min[0][key]);
        }
      });
    });
  }
  updatedata();
  setInterval(updatedata, 5000);
});
</script>

@stop
