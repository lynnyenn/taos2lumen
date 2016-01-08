@extends('includes.base')
@section('title')
    {{ trans('base.about') }}
@stop
@section('css')
<link href="/css/about.css" rel="stylesheet">
<link href="/css/hover_effects.css" rel="stylesheet">
<link href="/css/overlay.css" rel="stylesheet">
@stop
@section('content')
    <h2 class="padded">{{ trans('base.about') }}</h2>
    <div class="ui divider"></div>
    <div class="ui grid">
        <div class="thirteen wide column">
            <h4>{{ trans('about.institutional') }}</h4>
            <article id="institutional" class="section linkcolor">
                <div class="ui grid stackable">
                    <div class="three wide column"><a href="http://www.asiaa.sinica.edu.tw/" target="_blank">
                    <img src="/images/about/logo_asiaa.png" class="ui image"></a>
                    </div>
                    <div class="thirteen wide column">
                        <a href="http://www.asiaa.sinica.edu.tw/" target="_blank">
                        {{ trans('about.asiaa_fullname') }}</a>
                        <div class="ui divider"></div>
                        {{ trans('about.asiaa_address') }}<br />
                        {{ trans('about.tel') }}: +886-2-3365-2200<br />
                    </div>
                </div>
                <div class="ui grid stackable">
                    <div class="three wide column"><a href="http://www.astroscu.unam.mx/" target="_blank">
                    <img src="/images/about/logo-unam.png" class="ui image"></a></div>
                    <div class="thirteen wide column">
                        <a href="http://www.astroscu.unam.mx/" target="_blank">{{ trans('about.unam_fullname') }}</a>
                        <div class="ui divider"></div>
                        Apartado postal 106 22800 Ensenada Baja California, Mexico.<br />
                        {{ trans('about.tel') }}: +52 (646) 174 4593<br />
                    </div>
                </div>
                <div class="ui grid stackable">
                    <div class="three wide column"><a href="https://www.cfa.harvard.edu/" target="_blank">
                    <img src="/images/about/logo_cfa.png" class="ui image"></a>
                    </div>
                    <div class="thirteen wide column">
                        <a href="https://www.cfa.harvard.edu/" target="_blank">{{ trans('about.cfa_fullname') }}</a>
                        <div class="ui divider"></div>
                        60 Garden Street Cambridge, MA 02138<br />
                        {{ trans('about.tel') }}: +1-617-495-7461<br />
                    </div>
                </div>
            </article>
            <h4>{{ trans('about.people') }}</h4>
            <div class="field">
            @foreach ($companys as $company=>$peoples)
                <div class="company">{{ trans('about.'.$company) }}</div>
                <div class="scrollspy grid {{ $company }}" id="{{ $company }}">
                    @foreach($peoples as $people)
                        <figure class="effect">
                            @if($people->photo)
                                <img src="/images/people/{{ $people->photo }}" alt="{{ $people->name }}"/>
                            @else
                                <img src="/images/people/none.gif" alt="{{ $people->name }}"/>
                            @endif
                            <figcaption>
                                <h2>{{ $people->name }}<span></span><div>{{ $people->title }}</div></h2>
                                <p>
                                    @if($people->mail)
                                        <span><i class="tiny mail icon"></i>&nbsp;
                                        <?php echo str_replace('@', '&#64;', $people->mail); ?></span>
                                    @endif
                                    @if($people->page)
                                        <span><i class="tiny warning circle icon"></i>&nbsp;
                                        <a href="{{ $people->page }}" target="_blank">Profiles</a></span>
                                    @endif
                                </p>
                            </figcaption>
                        </figure>
                    @endforeach
                </div>
            @endforeach
           </div>
           <h4>{{ trans('about.industrial') }}</h4>
           <article id="industrial" class="section scrollspy">
                <div class="partner ui grid stackable three column">
                    <div class="column"><a href="http://www.ashdome.com/" target="_blank"><img src="/images/about/Ash-Dome.gif" class="ui image"></a></div>
                    <div class="column"><img src="/images/about/salazar.gif" class="ui image"></div>
                    <div class="column"><a href="http://www.e2v.com/" target="_blank">
                    <img src="/images/about/e2v.gif" class="ui image"></a></div>
                    <div class="column"><a href="http://www.dfmengineering.com/" target="_blank"><img src="/images/about/dfm.gif" class="ui image" ></a></div>
                    <div class="column"><a href="http://www.gbcinc.com/" target="_blank"><img src="/images/about/gbc.jpg" class="ui image"></a></div>
                </div>
            </article>
        </div>
        <div class="three wide column">
            <div class="ui overlay labeled icon nolinkcolor">
                <a href ="#institutional" class="item institutional">Institutional Partners</a>
                <a href ="#asiaa" class="item">People</a>
                <div class="list">
                    <a href ="#asiaa" class="item asiaa">ASIAA</a>
                    <a href ="#unam" class="item unam">UNAM</a>
                    <a href ="#cfa" class="item cfa">CFA</a>
                    </div>
                <a href ="#industrial" class="item industrial">Industrial Partners</a>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script type="text/javascript" src="/js/modernizr.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
      // fix main menu to page on passing
      $('.overlay').visibility({
        type: 'fixed',
        offset: 10
      });
      @foreach ($companys as $company=>$peoples)
        $('#{{ $company }}').visibility({
            continuous: true,
            onOnScreen: function() {
             $('.overlay .item').removeClass('active');
             $('.overlay .{{ $company }}').addClass('active');
            },
            onOffScreen : function() {
               $('.overlay .{{ $company }}').removeClass('active');
            }
        });
      @endforeach
        $('#institutional').visibility({
            continuous: true,
            onOnScreen: function() {
             $('.overlay .item').removeClass('active');
             $('.overlay .institutional').addClass('active');
            },
            onOffScreen : function() {
               $('.overlay .institutional').removeClass('active');
            }
        });
        $('#industrial').visibility({
            continuous: true,
            onOnScreen: function() {
             $('.overlay .item').removeClass('active');
             $('.overlay .industrial').addClass('active');
            },
            onOffScreen : function() {
               $('.overlay .industrial').removeClass('active');
            }
        });
    }) ;
    </script>
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
@stop
