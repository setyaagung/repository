@extends('layouts.back-main')

@section('title','Data Edisi')

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
                                Data Edisi
                            </h3>
                            <a href="{{ route('edisi.create')}}" class="btn btn-primary btn-sm float-right">Tambah</a>
                        </div>
                        <div class="card-body">
                            @if ($message = Session::get('create'))
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <strong>Success!</strong> {{$message}}.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if ($message = Session::get('update'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Updated!</strong> {{$message}}.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if ($message = Session::get('delete'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Deleted!</strong> {{$message}}.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>GAMBAR</th>
                                        <th>TEMA</th>
                                        <th>NAMA EDISI</th>
                                        <th>TAHUN TERBIT</th>
                                        <th>ISSN</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($edisis as $edisi)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>
                                                @if ($edisi->gambar == null)

                                                @else
                                                    <img src="{{ Storage::url($edisi->gambar)}}" class="img-fluid" width="100" alt="">
                                                @endif
                                            </td>
                                            <td>{{ $edisi->tema}}</td>
                                            <td>{{ $edisi->nama_edisi}}</td>
                                            <td>{{ \Carbon\Carbon::parse($edisi->tahun_terbit)->isoFormat('D MMMM Y')}}</td>
                                            <td>{{ $edisi->issn}}</td>
                                            <td>
                                                <a href="{{ route('edisi.edit',$edisi->id_edisi)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                <form action="{{ route('edisi.destroy', $edisi->id_edisi)}}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini??')"><i class="fas fa-trash"></i> Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
