@extends('includes.base')
@section('title')
    {{ trans('base.publications') }}
@stop
@section('content')
    <h2>{{ trans('base.publications') }}</h2>
    <hr/>
    <article>
    @if(count($publications))
        <div class="row publication">
        @foreach($publications as $index => $publication)
            <div class="col s12 textindent">
                <button class="circular ui icon button disabled">{{ $index+1 }}</button>&nbsp;
                <a class="title" href="{{ $publication->link }}" target="_blank">{{ $publication->title }}.</a>
                <span>{{ $publication->authors }}.</span>
                <span><i>{{ $publication->affiliation }}</i>,</span>
                <span>{{ $publication->published_at->format('M. Y') }}</span>
                <span>{{ $publication->abstract }}</span>
                @unless($publication->publication_link->isEmpty())
                    @foreach($publication->publication_link as $link)
                        <span class="linkcolor">[&nbsp;<a href="{{ $link->link }}" target="_blank">{{ $link->name }}</a>&nbsp;]</span>
                    @endforeach
                @endunless
            </div>
        @endforeach
        </div>
    </article>
    @endif
@stop
