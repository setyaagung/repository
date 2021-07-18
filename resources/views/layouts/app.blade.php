<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="shortcut icon" href="{{ asset('img/logo.png')}}" type="image/x-icon">
    <title>@yield('title')</title>
    <meta name="title" content="STIE Cendekia Karya Utama | Cendekiaku Repository">
    <meta name="description" content="STIE Cendekia Karya Utama | Cendekiaku Repository">
    <meta name="site_name" content="STIE Cendekia Karya Utama">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light" style="background: #eaeaea">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('img/logo-stie-cku.png')}}" class="img-fluid" alt="">
                </a>
            </div>
        </nav>
        <div class="upper-bar">
            <div class="container">
                <div class="col-md-12">
                    <a href="/" class="float-left"><i class="fa fa-home"></i> Cendekiaku Repository</a>
                    @guest
                        <a href="{{ route('login')}}">Login</a>
                    @else
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        @yield('search')
        <div class="row">
            <div class="col-md-9">
                @yield('content')
            </div>
            <div class="col-md-3">
                <p class="mt-4" style="margin-bottom: 5px;font-size: 14px">BROWSE</p>
                <ul class="list-group" style="font-size: 14px">
                    <li class="list-group-item" style="background: #161616;color:white;" aria-current="true">All of Cendekiaku Repository</li>
                    <li class="list-group-item" style="border:1px solid #eaeaea !important">
                        Author
                        <span class="badge badge-primary badge-pill">{{ \App\Model\Author::count()}}</span>
                    </li>
                    <li class="list-group-item" style="border:1px solid #eaeaea !important">
                        Jurnal
                        <span class="badge badge-primary badge-pill">{{ \App\Model\Jurnal::count()}}</span>
                    </li>
                </ul>

                <p class="mt-4" style="margin-bottom: 5px;font-size: 14px">MY ACCOUNT</p>
                <ul class="list-group" style="font-size: 14px">
                    <li class="list-group-item" style="border:1px solid #eaeaea !important">
                        <a href="{{ route('login')}}" class="text-dark side-login">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer mt-5" style="min-height: 50px">
        <div class="container">
            <hr style="border-top: 1px solid #eaeaea !important;margin-top: -2px;">
            <div class="row">
                <div class="col-md-6">
                    <p style="font-size: 14px">Copyright &copy; 2021
                        <a href="https://cendekiaku.ac.id" class="copy" style="color: #04009A;" target="_blank">STIE Cendekia Karya Utama</a>
                        <br>All rights reserved
                    </p>

                </div>
            </div>
        </div>
    </div>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>
