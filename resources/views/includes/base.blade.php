<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.header')
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/semantic.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/include.css">
    @yield('css')
    <script src="js/jquery.min.js"></script>
    <script src="js/semantic.min.js"></script>
</head>
<body>
    <div class="pureparallax">
        @include('includes.nav')
        @yield('nav_home')
        <!-- Main -->
        <section id="main" class="ui container">
            @yield('content')
        </section>
    </div>
    @include('includes.footer')
    <!-- Scripts-->
    <script>if (!window.jQuery) { document.write('<script src="js/jquery/dist/jquery.min.js"><\/script>'); }</script>
    <script type="text/javascript">
        $('nav .ui.dropdown')
          .dropdown({
            on: 'hover'
          });
        $('nav .ui.sidebar')
          .sidebar('attach events', 'nav .m_menu .item')
        ;
        $('.update').delay(3000).slideUp(300);
        // Show sideNav
        $(".button-collapse").sideNav();
        $('.dropdown-button').dropdown({
        });
        $('.dropdown-lang').dropdown({
            constrain_width: true,
            hover: true, // Activate on hover
            gutter: 0, // Spacing from edge
            belowOrigin: true, // Displays dropdown below the button
        });
    </script>
    @yield('js')
    <!-- Google Analytics -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-71102442-1', 'auto');
        ga('send', 'pageview');

    </script>
</body>
</html>