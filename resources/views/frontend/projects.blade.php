@extends('includes.base')
@section('title')
    {{ trans('base.project') }}
@stop
@section('css')
<link href="/css/overlay.css" rel="stylesheet">
@stop
@section('nav_home')
@stop
@section('content')
<h2 class="padded">{{ trans('base.project') }}</h2>
<div class="ui divider"></div>
<div class="ui grid">
    <div class="thirteen wide column">
        @foreach ($projects as $project)
        <article id="{{ $project->order_by }}">
        <h4 class="header">{{ $project->title }}</h4>
            {!! $project->body !!}
        </article>
        @endforeach
    </div>
    <div class="three wide column">
      <div class="ui overlay labeled icon nolinkcolor">
        @foreach ($projects as $project)
            <a href="#{{ $project->order_by }}" class="item {{ $project->order_by }}">{{ $project->title }}</a>
        @endforeach
    </div>
</div>
@stop
@section('js')
    <script type="text/javascript">
    $(document).ready(function() {
      // fix main menu to page on passing
      $('.overlay').visibility({
        type: 'fixed',
        offset: 10
      });
      @foreach ($projects as $project)
        $('#{{ $project->order_by }}').visibility({
            continuous: true,
            onOnScreen: function() {
             $('.overlay .item').removeClass('active');
             $('.overlay .{{ $project->order_by }}').addClass('active');
            },
            onOffScreen : function() {
               $('.overlay .{{ $project->order_by }}').removeClass('active');
            }
        });
      @endforeach
    }) ;
    </script>
@stop