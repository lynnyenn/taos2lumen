@extends('includes.base')
@section('title')
    {{ trans('base.charts') }}
@stop
@section('css')
<link rel="stylesheet" href="/css/charts.css">
<link rel="stylesheet" href="/weather/css/weather-icons.min.css">
@stop
@section('content')
  <h2 class="padded">{{ trans('base.charts') }}</h2>
  <div class="six ui buttons">
    <button class="ui button active">Today</button>
    <button class="ui button">Yesterday</button>
    <button class="ui button">3 day</button>
    <button class="ui button">Weed</button>
    <button class="ui button">Month</button>
    <button class="ui button">Year</button>
  </div>
  <div class="ui segment">
    <div class="ui floating labeled icon sitedropdown dropdown button">
      <i class="signal icon"></i>
      <span class="text stationid">wxtd# 0</span>
      <div class="menu">
        <div class="item" data-value="0">
          wxtd# 0
        </div>
        <div class="item" data-value="1">
          wxtd# 1
        </div>
        <div class="item" data-value="2">
          wxtd# 2
        </div>
      </div>
    </div>
    <div id="charts"></div>
  </div>
  <div class="ui segment">
    <h4 class="segtitle">Live camera
    <span class="segsubtitle">Image updated every 30 seconds</span></h4>
    <div id="images" class="ui stackable two column grid">
      <div class="column" id="slide0">
        <div class="ui fluid image">
          <div class="ui blue ribbon label"> Central Control</div>
          <a href="http://132.248.4.197/cgi-bin/viewer/video.jpg" target="_blank">
          <img src="http://132.248.4.250/oanspm/taos/video24.jpg" alt="Central Control"></a>
        </div>
      </div>
       <div class="column" id="slide1">
        <div class="ui fluid image">
          <div class="ui blue ribbon label"> Site 1</div>
          <a href="http://132.248.4.199/cgi-bin/viewer/video.jpg" target="_blank"><img src="http://132.248.4.250/oanspm/taos/video23.jpg" alt="Site 1"></a>
        </div>
      </div>
      <div class="column" id="slide2">
        <div class="ui fluid image">
          <div class="ui blue ribbon label"> Site 2</div>
          <a href="http://132.248.4.201/cgi-bin/viewer/video.jpg" target="_blank"><img src="http://132.248.4.250/oanspm/taos/video22.jpg" alt="Site 2"></a>
        </div>
      </div>
      <div class="column" id="slide3">
        <div class="ui fluid image">
          <div class="ui blue ribbon label"> Site 3</div>
          <a href="http://132.248.4.200/cgi-bin/viewer/video.jpg" target="_blank"><img src="http://132.248.4.250/oanspm/taos/video21.jpg" alt="Site 3"></a>
        </div>
      </div>
    </div>
  </div>
@stop
@section('js')
<script src="http://d3js.org/d3.v3.js"></script>
<script src="/js/charts/overview.js"></script>
<script type="text/javascript">
  function updateImages() {
      var d = new Date();
      f = d.toLocaleString("en-GB", {timeZone: "America/Tijuana"});
      //change img src
      $("#slide0 img").attr("src", "http://132.248.4.250/oanspm/taos/video24.jpg?"+d.getTime());
      $("#slide1 img").attr("src", "http://132.248.4.250/oanspm/taos/video23.jpg?"+d.getTime());
      $("#slide2 img").attr("src", "http://132.248.4.250/oanspm/taos/video22.jpg?"+d.getTime());
      $("#slide3 img").attr("src", "http://132.248.4.250/oanspm/taos/video21.jpg?"+d.getTime());
  }
  setInterval(updateImages, 30000); //  1000 miliseconds
  var handler = {
    activate: function() {
      $(this)
        .addClass('active')
        .siblings()
        .removeClass('active');
    }
  }
  $('.ui.buttons .button').on('click', handler.activate)
</script>

@stop
