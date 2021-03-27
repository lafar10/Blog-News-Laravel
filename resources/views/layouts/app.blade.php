<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</head>
<body style="background-color:white;">

    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow p-3 fixed-top">
            <div class="container">
                <a id="title_page" class="blog-header-logo text-success" href="{{route('LR9News')}}">
                    @foreach (App\Icon::where('id',1)->get() as $icon)
                        <img src="{{asset('poc/'.$icon->icons)}}" width="80" height="75"  style="margin-left:50px;" >
                    @endforeach
                </a>
                <button class="navbar-toggler" type="button" align="right" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <ul class="navbar-nav mr-auto"  @if(LaravelLocalization::getCurrentLocale() == 'en')
                                                            style="--bs-scroll-height: 100px;margin-left:75px;"
                                                    @else
                                                            style="--bs-scroll-height: 100px;margin-left:145px;text-align:right;"
                                                    @endif >

                            @foreach(App\Category::select('category_name_'.LaravelLocalization::getCurrentLocale().' as category')->get() as $category)
                                    &nbsp;<li class="nav-item">
                                    <a href="{{ route('get.posts.categories',$category->category) }}" id="cat_nav">
                                    <strong>{{$category->category}}</strong>
                                    </a>
                                    </li>&nbsp;&nbsp;&nbsp;
                            @endforeach

                    </ul>
                </div>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <form action="" method="POST">
                            <a class="link-secondary" href="#" aria-label="Search" id="btn-modal" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
                            </a>
                                <a id="link" href="#"><i id="fb" class="fab fa-facebook"></i></a>&nbsp;&nbsp;
                                <a id="link" href="#"><i id="yt" class="fab fa-youtube"></i></a>&nbsp;&nbsp;
                                <a id="link" href="#"><i id="tw" class="fab fa-twitter"></i></a>&nbsp;&nbsp;
                                <a id="link" href="#"><i id="is" class="fab fa-instagram"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <a id="cat_v" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            <strong>{{ $properties['native'] }}</strong> &nbsp;
                                        </a>
                                    @endforeach
                        </form>


                        <!-- Authentication Links
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" id="navtent" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" id="navtent" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="far fa-user"></i> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" id="navtent" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest-->
                    </ul>

            </div>
        </nav>
            <br>
            <br>
            <br>
            <br>
            <br>

        <main class="py-4">
            @yield('content')
        </main>

    </div>
<!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel" style="text-align:center;">{{__('messages.Search News')}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('get.search.news') }}" method="get">
                        @csrf
                        <div class="modal-body">
                                    <input type="text" name="search_news" class="form-control" placeholder="{{__('messages.write here what do you want')}}">

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


<footer class="bg-success">
    <div class="container py-3">
      <div class="row py-2">
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
            <ul class="list-inline mt-4" align="center">
                <li class="list-inline-item"><a href="#" target="_blank" id="linki"><i id="tw" class="fab fa-twitter"></i></i></a></li>
                <li class="list-inline-item"><a href="#" target="_blank" id="linki"><i id="fb" class="fab fa-facebook"></i></a></li>
                <li class="list-inline-item"><a href="#" target="_blank" id="linki"><i id="yt" class="fa fa-youtube"></i></a></li>
                <li class="list-inline-item"><a href="#" target="_blank" id="linki"><i id="is" class="fab fa-instagram"></i></i></a></li>
              </ul>
              @foreach (App\Icon::where('id',1)->get() as $icon)
                    <img src="{{asset('poc/'.$icon->icons)}}" width="110" height="110"  style="margin-left:120px;" >
              @endforeach
              <br>
          <h4 class="text-uppercase font-weight-bold mb-4 text-white" align="center">شبكة لر 9 الإعلامية</h4>
          <h4 class="text-uppercase font-weight-bold mb-4 text-white" align="center">LR9News Media Network</h4>
          <h6 class="text-uppercase  mb-4 text-white" align="center">جميع الحقوق محفوظة © 2021 شبكة لر 9 الإعلامية</h6>
        </div>

        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
            <br>
            <h3 class="text-uppercase font-weight-bold mb-4 text-white" @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                                                                style="text-align:center;"
                                                                        @else
                                                                                style="text-align:center;"
                                                                        @endif >{{__('messages.About US')}}</h3>
          <ul class="list-unstyled mb-0" @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                                style="text-align:center;"
                                        @else
                                                style="text-align:center;"
                                        @endif >
            <li class="mb-2"><a href="#" class="text-white">Login</a></li>
            <li class="mb-2"><a href="#" class="text-white">Register</a></li>
            <li class="mb-2"><a href="#" class="text-white">Wishlist</a></li>
            <li class="mb-2"><a href="#" class="text-white">Our Products</a></li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
            <br>
            <h3 class="text-uppercase font-weight-bold mb-4 text-white" @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                                                                style="text-align:center;"
                                                                        @else
                                                                                style="text-align:center;"
                                                                        @endif >{{__('messages.Contact US')}}</h3>
          <ul class="list-unstyled mb-0" @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                                style="text-align:center;"
                                        @else
                                                style="text-align:center;"
                                        @endif >
            <li class="mb-2"><a href="#" target="_blank" id="linki"><i id="tw" class="fab fa-twitter" > {{__('messages.twitter')}}</i></i></a></li>
            <li class="mb-2"><a href="#" target="_blank" id="linki"><i id="yt" class="fa fa-youtube">  {{__('messages.youtube')}}</i></a></li>
            <li class="mb-2"><a href="#" target="_blank" id="linki"><i id="fb" class="fab fa-facebook">  {{__('messages.facebook')}}</i></a></li>
            <li class="mb-2"><a href="#" target="_blank" id="linki"><i id="is" class="fab fa-instagram"> {{__('messages.instagram')}}</i></a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
            <br>
          <h3 class="text-uppercase font-weight-bold mb-4 text-white" @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                                                            style="text-align:center;"
                                                                    @else
                                                                            style="text-align:center;"
                                                                    @endif >{{__('messages.Categories')}}</h3>
          <ul class="list-unstyled mb-0" style="text-align:right;">
                 @foreach(App\Category::select('category_name_'.LaravelLocalization::getCurrentLocale().' as category')->get() as $category)
                        <li class="mb-2" @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                                style="text-align:center;"
                                         @else
                                                style="text-align:center;"
                                         @endif >
                        <a href="#" class="text-muted"><strong style="color:white;">{{$category->category}}</strong></a></li>
                 @endforeach
          </ul>
        </div>
      </div>
    </div>

    <!-- Copyrights
    <div class="bg-white py-3">
      <div class="container text-center">
        <h4  style="color:green;">© 2021 LR9News All rights reserved.</h4>
      </div>
    </div> -->
  </footer>

    <script src="https://kit.fontawesome.com/aea6f500cc.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    @yield('scripts')
</body>
</html>
