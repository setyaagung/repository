@extends('layouts.app')

@section('title','Cendekiaku Repository')
@section('content')
    <div class="search mt-5" id="search">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-9">
                    <h1>Cendekiaku Repository</h1>
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
                    <a href="{{ route('detail',[$jurnal->id_jurnal,$jurnal->tahun_terbit])}}" class="title font-weight-bold" style="font-size: 16px;color: #04009A;">{{ $jurnal->judul}}</a>
                    <p class="text-secondary" style="font-size: 14px">
                        @foreach ($jurnal->jurnalAuthors as $jurnalAuthor)
                            {{ $jurnalAuthor->author->nama_author}} |
                        @endforeach
                        ({{ $jurnal->tahun_terbit}})
                    </p>
                    <p style="font-size: 14px;margin-top: -15px" class="text-justify">{{ Str::limit($jurnal->abstrak,300)}}</p>
                    <a href="{{ Storage::url($jurnal->file)}}" class="btn btn-sm btn-secondary pl-5 pr-5" target="_blank"><i class="fa fa-file-pdf-o"></i> Buka File</a>
                </div>
            @endforeach
            <div class="mt-4">
                {{ $jurnals->links()}}
            </div>
        </div>
    </div>
@endsection
