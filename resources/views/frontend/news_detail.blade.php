@extends('includes.base')
@section('content')
    @if($news->title)
        <h4>{{ $news->title }}</h4>
        <hr/>
        <blockquote>{!! $news->published_at->toFormattedDateString() !!}</blockquote>
        <article class="news"><div class="body">
        {!! $news->body !!}
        </div></article>
    @else
        <blockquote>{{ trans('base.notrans') }}</blockquote>
    @endif
@stop