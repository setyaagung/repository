@extends('layouts.back-main')

@section('title','Tambah Author')

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
                                Tambah Author
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('author.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Nama Author</label>
                                    <input type="text" class="form-control @error('nama_author') is-invalid @enderror" name="nama_author" value="{{ old('nama_author') }}" autofocus>
                                    @error('nama_author')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="float-right">
                                    <a href="{{ route('author.index')}}" class="btn btn-secondary">Kembali</a>
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
