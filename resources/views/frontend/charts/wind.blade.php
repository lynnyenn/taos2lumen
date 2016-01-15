@extends('includes.base')
@section('title')
    {{ trans('base.charts') }}
@stop
@section('css')
<link rel="stylesheet" href="/css/linechart.css">
<link rel="stylesheet" href="/css/charts.css">
@stop
@section('content')
    <h2 class="padded">{{ trans('base.charts') }}</h2>
    <div class="windroserow">
        <div class="span6" id="windrose"></div>
        <div class="span6" id="windroseavg"></div>
    </div>
@stop
@section('js')
<script src="http://d3js.org/d3.v3.js"></script>
<script src="/js/windrose.js"></script>
@stop
