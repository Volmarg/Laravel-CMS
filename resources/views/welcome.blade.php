<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @if($_SERVER['REQUEST_URI']=='/')
            <title>Home Page Laravel - Volmarg CMS</title>
        @else
            @yield('meta')
        @endif

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/frontend.css">



        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                margin: 0;
            }

            .full-height {
                /*height: 100vh;*/
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/compiledPostsFront.css">
        @yield('scripts')
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <ul class="menuFront">
                    @auth
                        <li> <a href="{{ url('/home') }}">CMS panel</a> </li>
                    @else
                      <li> <a href="{{ route('login') }}">Login</a></li>
                      <li><a href="{{ route('register') }}">Register</a></li>
                    @endauth

                    @foreach ($menuElements as $key => $lvl_1)
                      {{-- but print only if given element doesnt have a parent so it's main menu element --}}
                      @if ($lvl_1->parentID=='-1')
                                <li class="dropdown">
                                    <a href="#"
                                       class="dropdown-toggle"
                                       data-toggle="dropdown"
                                       role="button"
                                       aria-expanded="false"
                                       aria-haspopup="true"
                                    >
                                        {{$lvl_1->name}} <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach ($menuElements as $key_ => $lvl_2)
                                            @if ($lvl_1->id==$lvl_2->parentID)
                                                <li  class="dropdown-item">
                                                    <a

                                                       href="{{$lvl_2->slug}}"
                                                    >
                                                        {{$lvl_2->name}}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach


                                    </ul>
                                </li>

                      @endif
                    @endforeach

                  </ul>
                </div>
            @endif

            <div class="content">
              @yield('content')
            </div>
        </div>
    </body>
</html>
