@extends('includes.base')
@section('title')
    {{ trans('base.gallery') }}
@stop
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/gallery.css" />
@stop
@section('content')
    <h2 class="padded">{{ trans('base.gallery') }}</h2>
    <div class="ui divider"></div>
    <div id="gallery"></div>
@stop
@section('js')
    <script type="text/javascript" src="/js/jquery.gallery.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#gallery").nanoGallery({
                thumbnailL1Width: '140C XS100 SM100',
                thumbnailL1Height: '140C XS100 SM100',
                thumbnailWidth: 'auto',
                thumbnailHoverEffect: [{
                    'name': 'slideUp'
                }],
                thumbnailAlignment: 'left',
                i18n: {
                    breadcrumbHome: '{{ trans('base.site') }}'
                },
                kind: 'picasa',
                userID: '104462019079494153056', //IAA
                albumList: '6213886731938950337|6223199330329483313|6057639533726910961|6228806026695856913|6228805740769126177|6228805336032805473',
                viewerToolbar: {
                    standard: 'minimizeButton ,label',
                    minimized: 'minimizeButton , previousButton, pageCounter ,nextButton,fullscreenButton,infoButton,linkOriginalButton,closeButton'
                },
                fnImgToolbarCustInit: function(elementName) {
                    return ('<div>build</div>');
                },

            });
        });
    </script>
@stop