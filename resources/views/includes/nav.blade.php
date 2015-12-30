<nav>
  <div id="navwrapper" class="ui menu inverted">
    <div class="ui attached m_menu hide-on-med-and-up">
      <a class="item">
        <i class="sidebar icon"></i>
      </a>
    </div>
    <div class="item">
      <span class="logo"><a href="{{ route('path') }}/">TAOS II</a></span><span class="chinesetitle">海王星外自動掩星普查計劃</span>
    </div>
    <div class="right menu">
      <a class="item" href="{{ route('path') }}/about">{{ trans('base.about') }}</a>
      <a class="item" href="{{ route('path') }}/news">{{ trans('base.news') }}</a>
      <div class="ui dropdown item ">{{ trans('base.project') }}
        <i class="dropdown icon"></i>
        <div class="menu">
          <a class="item" href="{{ route('path') }}/projects#1">{{ trans('base.telescopes') }}</a>
          <a class="item" href="{{ route('path') }}/projects#2">{{ trans('base.cameras') }}</a>
          <a class="item" href="{{ route('path') }}/projects#3">{{ trans('base.site') }}</a>
        </div>
      </div>
      <a class="item" href="{{ route('path') }}/gallery">{{ trans('base.gallery') }}</a>
      <a class="item" href="{{ route('path') }}/publications">{{ trans('base.publications') }}</a>
    </div>
  </div>
    <!-- for mobile only -->
  <div class="ui left vertical menu sidebar mobile">
    <a class="item">
      <i class="large icons">
        <i class="travel icon"></i>
      </i> {{ trans('base.about') }}
    </a>
    <a class="item">
      <i class="large icons">
        <i class="newspaper icon"></i>
      </i> {{ trans('base.news') }}
    </a>
    <a class="item">
      <i class="large icons">
        <i class="info circle icon"></i>
      </i> {{ trans('base.project') }}
    </a>
    <a class="item">
      <span class="subitem">{{ trans('base.telescopes') }}</span>
    </a>
    <a class="item">
      <span class="subitem">{{ trans('base.cameras') }}</span>
    </a>
    <a class="item">
      <span class="subitem">{{ trans('base.site') }}</span>
    </a>
    <a class="item">
      <i class="large icons">
        <i class="file image outline icon"></i>
      </i> {{ trans('base.gallery') }}
    </a>
    <a class="item">
      <i class="large icons">
        <i class="book icon"></i>
      </i> {{ trans('base.publications') }}
    </a>
  </div>
    <!-- end mobile -->
</nav>