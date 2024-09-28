<title>Edit Kegiatan</title>

@extends('layout.main')
@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">FORM EDIT KEGIATAN</h3>
                    </div>
                    <form class="form-horizontal needs-validation" 
                          action="{{ url('/kegiatan/updateKegiatan/' . $kegiatan->id) }}"
                          method="post"
                          enctype="multipart/form-data" 
                          novalidate>
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label required">Paket Kegiatan</label>
                                <div class="col-sm-4">
                                    <select id="paket_kegiatan_id" name="paket_kegiatan_id" class="form-control" required>
                                        @foreach($paketKegiatan as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == $kegiatan->paket_kegiatan_id ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Paket Kegiatan wajib diisi.</div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label required">Nama Kegiatan</label>
                                <div class="col-sm-4">
                                    <input type="text" id="nama" name="nama" class="form-control" value="{{ $kegiatan->nama }}" required>
                                    <div class="invalid-feedback">Nama Kegiatan wajib diisi.</div>
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label required">Harga Kegiatan</label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input type="text" name="harga" class="form-control" value="{{ $kegiatan->harga }}" required>
                                        <div class="invalid-feedback">Harga kegiatan wajib diisi.</div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label required">Isi Konten</label>
                                <div class="col-sm-9">
                                    <textarea id="summernote" name="konten" class="form-control" required>{{ $kegiatan->konten }}</textarea>
                                    <div class="invalid-feedback">Keterangan konten wajib diisi.</div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label required">Poster Kegiatan</label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" 
                                                   class="custom-file-input" 
                                                   id="gambar"
                                                   name="gambar"
                                                   accept="image/*">
                                            <label class="custom-file-label" for="gambar">Pilih poster</label>
                                        </div>
                                    </div>
                                    <small class="form-text text-muted">
                                        Poster saat ini: 
                                        <a href="{{ asset('storage/gambar/' . $kegiatan->gambar_nama) }}" target="_blank" download="{{ $kegiatan->gambar_nama }}">
                                            {{ $kegiatan->gambar_nama }}
                                        </a><br>
                                        File yang diizinkan jpeg,png,jpg,gif,svg (Maks 5 MB)
                                    </small>
                                </div>
                            </div>
                            </div>
                        <div class="card-footer">
                            <a class="btn btn-secondary btn-sm mr-1" 
                               href="{{url('/kegiatan/daftarKegiatan')}}" 
                               role="button"><i class="fa fa-angle-left"></i>&nbsp;Kembali</a>
                            <button type="submit" class="btn btn-primary btn-sm mr-2 float-right">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('tail')
    <!-- Load Summernote CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
            $('#summernote').summernote({
                height: 300,
                width: 800,
                placeholder: 'Masukkan konten disini',
                callbacks: {
                    onImageUpload: function(files) {
                        uploadImage(files[0]);
                    }
                }
            });
            
            function uploadImage(file) {
                var formData = new FormData();
                formData.append('image', file);
                formData.append('_token', '{{ csrf_token() }}'); // CSRF token

                $.ajax({
                    url: '{{ route("upload-image") }}', // Pastikan rute ini sesuai dengan rute Anda
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        var imageUrl = response.url;
                        $('#summernote').summernote('insertImage', imageUrl);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    </script>
@endsection