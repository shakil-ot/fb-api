@include('layouts.header')

<body class="vertical-layout vertical-menu-modern content-left-sidebar navbar-floating footer-static menu-collapsed"
      data-open="click"
      data-menu="vertical-menu-modern"
      data-col="content-left-sidebar">

@include('layouts.top-header')


@include('layouts.side-menu')




<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            @yield('content')
        </div>
    </div>
</div>
<!-- END: Content-->



<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

@include('layouts.footer')


</body>
</html>
