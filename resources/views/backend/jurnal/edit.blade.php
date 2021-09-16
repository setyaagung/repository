@extends('layouts.back-main')

@section('title','Edit Jurnal')

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
                                Edit Jurnal
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('jurnal.update',$jurnal->id_jurnal)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="">Edisi Jurnal</label>
                                    <select name="id_edisi" class="form-control @error('id_edisi') is-invalid @enderror">
                                        <option value="">-- Pilih Edisi Jurnal --</option>
                                        @foreach ($edisis as $edisi)
                                            <option value="{{$edisi->id_edisi}}" {{ $jurnal->id_edisi == $edisi->id_edisi ? 'selected':''}}>{{ $edisi->tema}} - {{ $edisi->nama_edisi}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_edisi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Judul</label>
                                    <textarea name="judul" class="form-control @error('judul') is-invalid @enderror" rows="4">{{ $jurnal->judul}}</textarea>
                                    @error('judul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Abstrak</label>
                                    <textarea id="summernote" name="abstrak" class="form-control @error('abstrak') is-invalid @enderror" rows="10">{{ $jurnal->abstrak}}</textarea>
                                    @error('abstrak')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Kata Kunci</label>
                                    <textarea name="kata_kunci" class="form-control @error('kata_kunci') is-invalid @enderror" rows="2">{{ $jurnal->kata_kunci}}</textarea>
                                    @error('kata_kunci')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Tahun Terbit</label>
                                    <input type="date" name="tahun_terbit" class="form-control @error('tahun_terbit') is-invalid @enderror" value="{{ \Carbon\Carbon::parse($jurnal->tahun_terbit)->format('Y-m-d')}}">
                                    @error('tahun_terbit')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Upload File (PDF)</label>
                                    <input type="file" name="file" class="form-control p-1 @error('file') is-invalid @enderror" value="{{ Storage::url($jurnal->file)}}">
                                    @error('file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="float-right">
                                    <a href="{{ route('jurnal.index')}}" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Update</button>
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
        $('#summernote').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['fontsize', ['fontsize']],
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ]
        });
    });
</script>
@endpush
