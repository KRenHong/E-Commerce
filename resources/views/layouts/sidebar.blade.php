<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SkinSense') }}</title>

    <!-- Scripts -->
    <script src="{{asset('js/app.js')}}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!--Font cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Styles -->
    <link href="../../css/app.css" rel="stylesheet">
    <link href="../../css/mystyle.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row min-vh-100 flex-column flex-md-row">
            <aside class="col-12 col-md-3 col-xl-2 p-0 bg-dark flex-shrink">
                <nav class="navbar navbar-expand-md navbar-dark bd-dark flex-md-column flex-row align-items-center py-2 text-center sticky-top" id="sidebar">
                    <div class="text-center p-3">
                        <div class="navbar-brand mx-0 font-weight-bold text-nowrap">
                            <i class="fa fa-users-cog"></i> Control panel
                        </div>
                    </div>

                    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <!---nav -->
                    <div class="collapse navbar-collapse prdr-last" id="navbarToggleExternalContent">
                        <ul class="navbar-nav flex-column w-100 justify-content-center align-items-sm-start admin-nav">
                            <li class="nav-item">
                                <a href="{{route('home')}}" class="nav-link"><i class="fas fa-globe"></i> Visit Site</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('category.index')}}" class="nav-link"><i class="fas fa fa-list"></i> Categories</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('item.index')}}" class="nav-link"><i class="fa fa-store"></i> Products</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('Comment.index')}}" class="nav-link"><i class="fa fa-comment"></i> Comments</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('order.index')}}" class="nav-link"><i class="fa fa-shopping-cart"></i> Orders</a>
                            </li>

                            {{-- logout button --}}
                            @guest

                            @if (Request::is("admin/login"))

                            @else

                            @endif

                            @else

                            @if (Auth()->guard("admin")->check())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.logout') }}"
                                    onclick="event.preventDefault(); 
                                            document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            </li>

                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            @endif

                        <!-- @if (Auth()->guard("admin")->check())
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::guard("admin")->user()->name }}</a>

                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                <ul class="nav justify-content-center">
                                    <li class="nav-item">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </li>

                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </div>
                        </li>

                        @endif -->
                            @endguest
                        </ul>
                    </div>
                </nav>
            </aside>

            <main class="col col-md-9 px-0 flex-grow-1">
                {{-- alerts --}}
                <div class="row">
                    <div class="col-md-8 mx-auto my-4">
                        @include('layouts.alerts')
                    </div>
                </div>

                <!--My Content-->
                <div class="container py-3">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
    @yield('javascript')
</body>
</html>