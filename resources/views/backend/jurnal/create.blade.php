@extends('layouts.back-main')

@section('title','Tambah Jurnal')

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
                                Tambah Jurnal
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('jurnal.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Judul</label>
                                    <textarea name="judul" class="form-control @error('judul') is-invalid @enderror" rows="4">{{ old('judul')}}</textarea>
                                    @error('judul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Tahun Terbit</label>
                                    <input type="date" name="tahun_terbit" class="form-control @error('tahun_terbit') is-invalid @enderror">
                                    @error('tahun_terbit')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Upload File (PDF)</label>
                                    <input type="file" name="file" class="form-control p-1 @error('file') is-invalid @enderror" value="{{ old('file')}}">
                                    @error('file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <table class="table table-bordered table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>NAMA AUTHOR</th>
                                                <th>
                                                    <a href="#" class="btn btn-sm btn-success addRow"><i class="fas fa-plus"></i></a>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="oke" class="body_author">
                                            <tr>
                                                <td>
                                                    <select name="id_author[]" class="form-control author" required>
                                                        <option value="">-- Pilih Author --</option>
                                                        @foreach ($authors as $author)
                                                            <option value="{{ $author->id_author}}">{{ $author->nama_author}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-danger remove"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="float-right">
                                    <a href="{{ route('jurnal.index')}}" class="btn btn-secondary">Kembali</a>
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

@push('scripts')
<script>
    $(document).ready(function(){

        $('.addRow').on('click',function(){
            addRow();
        });

        function addRow(){
            var tr ='';
                    tr += '<tr>';
                        tr += '<td>';
                            tr += '<select name="id_author[]" class="form-control author" required>';
                                tr += '<option value="">-- Pilih Author --</option>';
                                tr += '@foreach ($authors as $author)';
                                    tr+= '<option value="{{ $author->id_author}}">{{ $author->nama_author}}</option>';
                                tr += '@endforeach';
                            tr += '</select>';
                        tr += '</td>';
                        tr += '<td>';
                            tr += '<a href="#" class="btn btn-sm btn-danger remove"><i class="fas fa-trash"></i></a>';
                        tr += '</td>';
                    tr += '</tr>';
            $('.body_author').append(tr);
        }

        $(document).on('click','.remove', function(){
            if($('.body_author tr').length == 1){
                alert('Anda tidak dapat menghapus baris terakhir');
            }else{
                $(this).parent().parent().remove();
            }
        });
    });
</script>
@endpush
