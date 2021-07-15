@extends('layouts.app')

@section('title')
    {{ $jurnal->judul}}
@endsection
@section('content')
    <div class="mt-5" style="min-height: 50vh">
        <div class="container">
            <h5 style="color: #04009A">{{ $jurnal->judul}}</h5>
            <hr style="border-top: 1px solid #eaeaea !important;margin-top: -2px;">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset('img/logo.png')}}" class="img-fluid" width="70%">
                    <div class="mt-4" style="font-size: 14px">
                        <p style="color: #04009A">View / Download</p>
                        <p style="margin-top: -15px">
                            <a href="{{ Storage::url($jurnal->file)}}" class="btn btn-sm btn-secondary" target="_blank"><i class="fa fa-file-pdf-o"></i> Buka File</a>
                        </p>
                    </div>
                    <div class="mt-4" style="font-size: 14px">
                        <p style="color: #04009A">Tahun Terbit</p>
                        <p style="margin-top: -15px">{{ \Carbon\Carbon::parse($jurnal->tahun_terbit)->format('Y')}}</p>
                    </div>
                    <div class="mt-4" style="font-size: 14px">
                        <p style="color: #04009A">Author</p>
                        @foreach ($jurnal->jurnalAuthors as $item)
                            <p style="margin-top: -15px">{{ $item->author->nama_author}}</p>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-9">
                    <h6>Abstrak</h6>
                    <p style="font-size: 14px !important" class="text-justify">{!! $jurnal->abstrak !!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
