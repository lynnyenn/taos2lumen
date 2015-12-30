<?php /*<div id="lang-container">
<ul id='dropdown-lang'>
<li><a href=""></a>English</li>
<li><a href=""></a>繁體中文</li>
<li class="divider"></li>
</ul>
<a class='dropdown-lang btn grey lighten-5 grey-text' data-boxposititon="true" href='#' data-activates='dropdown-lang'><i class="material-icons tiny">arrow_drop_up</i></a>
</div>*/?>
<?php
$locatename = array('en' => 'English', 'tw' => '繁體中文');
$url = str_replace('tw/', '', $_SERVER['REQUEST_URI']);
?>
<div id="lang-container">
    <div class="ui selection dropdown dropdown-lang">
      <input type="hidden" name="lange">
      <i class="dropdown icon"></i>
      <div class="default text">{{ $locatename[app('translator')->getLocale()] }}</div>
      <div class="menu">
        @if(app('translator')->getLocale()=="tw")
            <div class="item"><a href="{{ $url }}">English</a></div>
            <div class="item">繁體中文</div>
        @else
            <div class="item">English</div>
            <div class="item"><a href="tw{{ $url }}">繁體中文</a></div>
        @endif

      </div>
    </div>
</div>