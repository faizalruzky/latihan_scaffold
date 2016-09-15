{{-- include_area_app_common_start --}}
@include('appleTypes._common'){{-- generated by scaffold - AppleType --}}
@include('apples._common'){{-- generated by scaffold - Apple --}}
{{-- include_area_app_common_end --}}

    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Project name</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Menu level 1<span class="caret"></span></a>
                        <ul id="app_navi" class="dropdown-menu" role="menu">
                        <li{!! Request::is('appleTypes*') ? ' class="active"' : '' !!}><a href="/appleTypes/">@yield('appleTypesAppTitle')</a></li>{{-- generated by scaffold - AppleType --}}
                        <li{!! Request::is('apples*') ? ' class="active"' : '' !!}><a href="/apples/">@yield('applesAppTitle')</a></li>{{-- generated by scaffold - Apple --}}



                        </ul>
                    </li>

                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>