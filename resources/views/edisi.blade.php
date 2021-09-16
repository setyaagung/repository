@extends('layouts.app')

@section('title','Edisi Cendekiaku Repository')

@section('search')
    <div class="search mt-5" id="search">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-9">
                    <h1>Cendekiaku Repository</h1>
                    <form action="{{ route('welcome')}}" method="GET">
                        <div class="form-group has-search">
                            <span class="fa fa-search form-control-feedback text-dark"></span>
                            <input type="search" name="search" class="form-control border border-dark shadow-dark" placeholder="Search">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="welcome mt-3">
        <div class="container">
            <h4 style="color: #161616">Edisi Repository STIE Cendekia Karya Utama</h4>
            <hr style="border-top: 1px solid #eaeaea !important;margin-top: -2px">
            <p class="text-justify" style="font-size: 14px">Repositori STIE Cendekia Karya Utama adalah layanan digital untuk pelestarian dan distribusi penelitian ilmiah tentang format materi digital. Hal ini memudahkan sivitas akademika untuk melestarikan dan membagikan publikasi ilmiahnya. Repositori ini juga merupakan sistem interoperable yang di-host dan dikelola oleh Perpustakaan Universitas.</p>
        </div>
    </div>
    <div class="text-center">
        <img src="{{ Storage::url($edisi->gambar)}}" class="img-fluid" width="600" alt="">
    </div>
    <div class="jurnal mt-5" style="min-height: 30vh">
        <div class="container">
            <h5>{{ $edisi->tema}} {{ $edisi->nama_edisi}} ISSN {{ $edisi->issn}} {{ \Carbon\Carbon::parse($edisi->tahun_terbit)->isoFormat('MMMM Y')}}</h5>
            <hr style="border-top: 1px solid #eaeaea !important;margin-top: -2px;">
            @foreach ($jurnals as $jurnal)
            <div class="jurnal-title mt-4">
                <a href="{{ route('detail',[$jurnal->id_jurnal,$jurnal->tahun_terbit])}}" class="title font-weight-bold" style="font-size: 16px;color: #04009A;">{{ $jurnal->judul}}</a>
                <p class="text-secondary" style="font-size: 14px">
                    @foreach ($jurnal->jurnalAuthors as $jurnalAuthor)
                        {{ $jurnalAuthor->author->nama_author}} |
                    @endforeach
                    ({{ \Carbon\Carbon::parse($jurnal->tahun_terbit)->format('Y')}})
                </p>
                @if ($jurnal->id_edisi == null)

                @else
                    <p style="margin-top: -17px;font-size:13px"><i class="font-weight-bold">{{ $jurnal->edisi->tema}} {{ $jurnal->edisi->nama_edisi}} ISSN {{ $jurnal->edisi->issn}} {{ \Carbon\Carbon::parse($jurnal->edisi->tahun_terbit)->isoFormat('MMMM Y')}}</i></p>
                @endif
                <p style="font-size: 14px;margin-top: -15px" class="text-justify">{!! Str::limit($jurnal->abstrak,300) !!}</p>
                @if ($jurnal->file == null)

                @else
                    <a href="{{ Storage::url($jurnal->file)}}" class="btn btn-sm btn-secondary pl-5 pr-5" target="_blank"><i class="fa fa-file-pdf-o"></i> Buka File</a>
                @endif
            </div>
        @endforeach
            <div class="mt-4">
                {{ $jurnals->links()}}
            </div>
        </div>
    </div>
@endsection
