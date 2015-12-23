process.env.DISABLE_NOTIFIER = true;

var elixir = require('laravel-elixir');
var gulp = require('gulp');

elixir(function(mix) {
    mix
     .copy('resources/assets/jquery/dist/jquery.min.js', 'public/js/jquery.js')
     .copy('resources/assets/semantic-ui/dist/semantic.min.js', 'public/js/semantic.js')
     .copy('resources/assets/semantic-ui/dist/semantic.css', 'public/css/semantic.css')
     .copy('resources/assets/semantic-ui/dist/themes/default/assets/fonts', 'public/css/themes/default/assets/fonts')
     .sass('include.scss')
     .sass('style.scss')
     .sass('home.scss');
});