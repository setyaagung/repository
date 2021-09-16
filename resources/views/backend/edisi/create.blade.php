@extends('layouts.back-main')

@section('title','Tambah Edisi')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">

    </div>
    <!-- /.content-header -->
    <section class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">
                                Tambah Edisi
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('edisi.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Tema</label>
                                    <input type="text" class="form-control @error('tema') is-invalid @enderror" name="tema" value="{{ old('tema') }}" autofocus>
                                    @error('tema')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Edisi</label>
                                    <input type="text" class="form-control @error('nama_edisi') is-invalid @enderror" name="nama_edisi" value="{{ old('nama_edisi') }}">
                                    @error('nama_edisi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Tahun Terbit</label>
                                    <input type="date" class="form-control @error('tahun_terbit') is-invalid @enderror" name="tahun_terbit" value="{{ old('tahun_terbit') }}">
                                    @error('tahun_terbit')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">ISSN</label>
                                    <input type="text" class="form-control @error('issn') is-invalid @enderror" name="issn" value="{{ old('issn') }}">
                                    @error('issn')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Gambar</label>
                                    <input type="file" class="form-control p-1 @error('gambar') is-invalid @enderror" name="gambar" value="{{ old('gambar') }}">
                                    @error('gambar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="float-right">
                                    <a href="{{ route('edisi.index')}}" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
