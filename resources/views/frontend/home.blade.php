@extends('includes.base')
@section('title')
    home
@stop
@section('css')
    <link rel="stylesheet" type="text/css" href="css/home.css">
@stop
@section('nav_home')
    @include('includes.nav_home')
@stop
@section('content')
<div class="home">
    <h2 class="header padded">{{ trans('base.project') }}</h2>
    <div class="ui stackable three column grid centered">
      <div class="column center aligned"><img class="circular image ui centered" src="images/projects/telescope.png">
        <div class="projec_title">{{ trans('base.telescopes') }}</div>
        <div>TAOS is in the process of procuring three telescopes from DFM Engineering in Longmont, Colorado.</div>
        <div style="padding-top: 5px"><a class="ui button" href="#1">{{ trans('base.more') }}</a></div></div>
      <div class="column center aligned"><img class="circular image ui centered" src="images/projects/camera.png">
        <div class="projec_title">{{ trans('base.cameras') }}</div>
        <div>The TAOS II cameras need to be capable of high-speed readout on a large number of stars.</div>
        <div style="padding-top: 5px"><a class="ui button" href="#2">{{ trans('base.more') }}</a></div></div>
      <div class="column center aligned"><img class="circular image ui centered" src="images/projects/site.png">
        <div class="projec_title">{{ trans('base.site') }}</div>
        <div>TAOS II will be installed at the Observatorio Astronomico Nacional (OAN) at San Pedro Mártir (SPM) in Baja California, México.
        </div>
        <div style="padding-top: 5px"><a class="ui button" href="#3">{{ trans('base.more') }}</a></div></div>
    </div>
    <div class="ui divider"></div>
    <h2 class="header padded">{{ trans('base.welcome') }}</h2>
    <article>
        {!! trans('base.welcomearticle') !!}
    </article>
    <div class="ui divider"></div>
    <h2 class="header padded">{{ trans('base.news') }}</h2>
    <p>
    @foreach($newslist as $news)
        @if($news->title)
        <div>
            <span class="hide-on-med-and-up" style="padding-right: 20px" >&bull;</span><span style="padding-right: 20px" class="hide-on-small-only">{{ $news->published_at->format('Y-m-d') }}</span><a href="{{ route('path') }}/news/{{ $news->id }}">{{ $news->title }}</a>
        </div>
        @endif
    @endforeach
    </p>

</div>
@stop