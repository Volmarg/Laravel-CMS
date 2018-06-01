<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('js/jquery-ui-1.12.1.custom/jquery-ui.css')}}">
    <!-- Scripts !-->

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('js/jquery-3.3.1.js')}}"></script>
    <script src="{{asset('js/jquery-ui-1.12.1.custom/jquery-ui.js')}}"></script>

    @yield('scripts')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/backend.css">
</head>
<body>

    <div id="app">


        <!-- new layout !-->
        <input id="hamburger" class="hamburger" type="checkbox" />
        <label for="hamburger" class="hamburger">
            <i></i>
            <text>
                <close>close</close>
                <open>menu</open>
            </text>
        </label>

        <!-- left side menu !-->

        <nav class="primnav">
            <ul>
                <li>
                    <a title="Dashboard" href="#dashboard">
                        <img src="{{asset('img/user-icon-dashboard.png')}}"/> Users
                    </a>
                    <ul class="secnav">
                        <li>
                            <a title="Users" href="{{url('/users/manage')}}">Manage </a>
                        </li>
                        <li>
                            <a title="Lists" href="{{url('/users/privilege')}}">Privileges</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a title="Mail" href="#mail">
                        <img src="{{asset('/img/posts-icon-dashboarad.png')}}"/> Posts
                    </a>
                    <ul class="secnav">
                        <li>
                            <a title="Users" href="/posts/create">Create</a>
                        </li>
                        <li>
                            <a title="Lists" href="/posts/manage">Manage</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a title="Notifications" href="#notifications">
                        <img src="{{asset('/img/media-icon-dashboard.png')}}" /> Media library
                    </a>
                    <ul class="secnav">
                        <li>
                            <a title="Users" href="{{url('/media/upload')}}">Upload</a>
                        </li>
                        <li>
                            <a title="Lists" href="{{url('/media/library')}}">Library</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a title="System Administration" href="#sysadmin">
                        <img src="{{asset('/img/menu-icon-dashboard.png')}}" /> Menu settings
                    </a>
                    <ul class="secnav">
                        <li>
                            <a title="Users" href="{{url('/menu')}}">Edit</a>
                        </li>
                        <li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- user right side !-->
        @auth
        <user id="user">
            <section>
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/93/Default_profile_picture_%28male%29_on_Facebook.jpg/600px-Default_profile_picture_%28male%29_on_Facebook.jpg" />
                <section>

                    <name>{{ Auth::user()->name }}</name>
                    <actions><a href="#settings">settings</a> |
                        <a href="{{ route('logout') }}"                                                                        onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                        </form>
                    </actions>



                </section>
            </section>
        </user>
        @endauth

        <!-- ICONS?? !-->

        <!-- new layout !-->


        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Volmarg CMS
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <!--2 nd !-->
                            <!--3 nd !-->
                        @endguest

                        <!-- here menu ends !-->
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->

    <script src="{{ asset('js/ajax.js')}}"></script>
    <script src="{{ asset('js/menuEdit.js')}}"></script>
    <script src="{{ asset('js/jqUiCalls.js')}}"></script>
    <script src="{{ asset('js/privilegesEdit.js')}}"></script>
    <script src="{{ asset('js/initializer.js')}}"></script>
    <script src="{{ asset('js/mediaLibrary.js')}}"></script>

</body>
</html>
