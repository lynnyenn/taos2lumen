<nav>
<div id="banner">
  <div class="ui menu inverted">
    <div class="ui attached m_menu mobile only">
      <a class="item">
        <i class="sidebar icon"></i>
      </a>
    </div>
    <div class="header item">
      <h3>TAOS II</h3>海王星外自動掩星普查計劃
    </div>
    <div class="right menu">
      <a class="item">{{ trans('base.about') }}</a>
      <a class="item">{{ trans('base.news') }}</a>
      <div class="ui dropdown item ">{{ trans('base.project') }}
        <i class="dropdown icon"></i>
        <div class="menu ">
          <a class="item">{{ trans('base.telescopes') }}</a>
          <a class="item">{{ trans('base.cameras') }}</a>
          <a class="item">{{ trans('base.site') }}</a>
        </div>
      </div>
      <a class="item">{{ trans('base.gallery') }}</a>
      <a class="item">{{ trans('base.publications') }}</a>
    </div>
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