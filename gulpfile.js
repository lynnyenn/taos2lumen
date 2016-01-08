var elixir = require('laravel-elixir');
var gulp = require('gulp');

process.env.DISABLE_NOTIFIER = true;

elixir(function(mix) {
    mix
     .copy('resources/assets/jquery/dist/jquery.min.js', 'public/js/jquery.js')
     .copy('resources/assets/semantic-ui/dist/semantic.min.js', 'public/js/semantic.js')
     .copy('resources/assets/semantic-ui/dist/semantic.css', 'public/css/semantic.css')
     .copy('resources/assets/semantic-ui/dist/themes/default/assets/fonts', 'public/css/themes/default/assets/fonts')
     .copy('resources/assets/angular/angular.min.js','public/js/angular.js')
     .copy('resources/assets/n3-charts/build/LineChart.js','public/js/linechart.js')
     .copy('resources/assets/n3-charts/build/LineChart.css','public/css/linechart.css')
     .copy('resources/assets/highcharts/highcharts.js','public/js/highcharts.js')
     .sass('include.scss')
     .sass('style.scss')
     .sass('home.scss')
     .sass('about.scss')
     .sass('overlay.scss')
});