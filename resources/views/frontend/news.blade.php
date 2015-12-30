@extends('includes.base')
@section('title')
    home
@stop
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/home.css">
@stop
@section('nav_home')

@stop
@section('content')
    <h2 class="padded">{{ trans('base.news') }}</h2>
    <div class="ui divider"></div>
    <article>
    @if(count($newslist))
        <div class="row news">
        @foreach($newslist as $news)
            @if($news->title)
                <h4 class="header">{{ $news->title }}</h4>
                <section class="date">{{ $news->published_at->format('Y-m-d') }}</section>
                <article>{!! str_limit($news->body, $limit = 500, $end = '...') !!}</article>
                <div class="readmore">
                    <a class="circular ui icon button " href="{{ route('path') }}/{{ $news->id }}"><i class="icon chevron right"></i></a>&nbsp;
                    <a href="{{ route('path') }}/news/{{ $news->id }}">Read more</a>
                </div>
                <div class="ui divider"></div>
            @endif
        @endforeach
        </div>
        <div class="pagination">
        {!! $newslist->render() !!}
        </div>
    </article>
    @endif
@stop
