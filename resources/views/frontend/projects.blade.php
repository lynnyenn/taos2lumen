@extends('includes.base')
@section('title')
    {{ trans('base.project') }}
@stop
@section('css')
<style type="text/css">
    .overlay{
        background-color: rgba(234, 239, 243, 0.8);
        padding:10px;
        font-size: 14px;
        font-weight: 300;
        width: 150px;
    }
    .overlay .item{
        display: block;
        padding-left: 10px;
    }
    .overlay .active{
        font-weight: 500;
        border-left: 2px solid #80d4f9;
        padding-left: 8px;
    }
</style>
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