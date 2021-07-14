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
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
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

    <div class="search mt-5" id="search">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-9">
                    <h1>Repository Cendekiaku</h1>
                    <form action="{{ route('welcome')}}" method="GET">
                        <div class="form-group has-search">
                            <span class="fa fa-search text-primary form-control-feedback"></span>
                            <input type="search" name="search" class="form-control border border-primary" placeholder="Search">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="welcome mt-3">
        <div class="container">
            <h4 style="color: #FB9300">Repository STIE Cendekia Karya Utama</h4>
            <hr style="border-top: 1px solid #eaeaea !important;margin-top: -2px">
            <p style="font-size: 14px">Repositori STIE Cendekia Karya Utama adalah layanan digital untuk pelestarian dan distribusi penelitian ilmiah tentang format materi digital. Hal ini memudahkan sivitas akademika untuk melestarikan dan membagikan publikasi ilmiahnya. Repositori ini juga merupakan sistem interoperable yang di-host dan dikelola oleh Perpustakaan Universitas.</p>
        </div>
    </div>
    <div class="jurnal mt-5" style="min-height: 30vh">
        <div class="container">
            <h5>Terbitan Terkini</h5>
            <hr style="border-top: 1px solid #eaeaea !important;margin-top: -2px;">
            @foreach ($jurnals as $jurnal)
                <div class="jurnal-title mt-4">
                    <a href="" class="title" style="font-size: 16px;color: #04009A;">{{ $jurnal->judul}}</a>
                    <p class="text-secondary" style="font-size: 14px">
                        @foreach ($jurnal->jurnalAuthors as $jurnalAuthor)
                            {{ $jurnalAuthor->author->nama_author}}
                        @endforeach
                        ({{ $jurnal->tahun_terbit}})
                    </p>
                    <p style="font-size: 14px;margin-top: -15px">{{ Str::limit($jurnal->abstrak,300)}}</p>
                    <a href="{{ Storage::url($jurnal->file)}}" class="btn btn-sm btn-secondary pl-5 pr-5" target="_blank"><i class="fa fa-file-pdf-o"></i> Buka File</a>
                </div>
            @endforeach
            <div class="mt-4">
                {{ $jurnals->links()}}
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
