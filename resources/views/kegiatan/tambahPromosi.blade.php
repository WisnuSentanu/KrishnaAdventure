<title>Tambah Promosi</title>

@extends('layout.main')
@section('content')
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- pesan error validasi -->
@if($errors->any())
<div class="row">
  <div class="col-lg-6">
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><b>Kesalahan !</b></h5>
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
@endif
<div class="row">
          <div class="col-lg-12">

            <div class="card card-info">

              <div class="card-header">
                <h3 class="card-title">FORM PENAMBAHAN PROMOSI</h3>
              </div>
              <!-- /.card-header -->
              <form class="form-horizontal needs-validation" 
                    action="{{ route('kegiatan.storePromosi', $kegiatan->id) }}" 
                    method="POST" 
                    enctype="multipart/form-data"
                    novalidate>
                          @csrf

                        <div class="card-body">

                        <div class="form-group row">
                                <label class="col-sm-3 col-form-label required">Paket Kegiatan</label>
                                <div class="col-sm-4">
                                <input type="text" class="form-control" value="{{ $kegiatan->paket_kegiatan->nama }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label required">Nama Kegiatan</label>
                                <div class="col-sm-4">
                                <input type="text" class="form-control" value="{{ $kegiatan->nama }}" disabled>
                                <input type="hidden" name="kegiatan_id" value="{{ $kegiatan->id }}">
                            </div>
                            </div>

                            <div class="form-group row">
                                    <label class="col-sm-3 col-form-label required">Harga Promo</label>
                                    <div class="col-sm-4">
                                    <div class="input-group">
                                    <div class="input-group-prepend">
                                    </div>
                                    <input type="text" name="harga_promo" class="form-control" value="{{ $kegiatan->harga_promo }}" required>
                                        <div class="invalid-feedback">Harga promo wajib diisi.</div>
                                    </div>
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label required">Isi Konten</label>
                                <div class="col-sm-6">
                                    <textarea id="summernote" name="konten_promo" class="form-control" required>{{ $kegiatan->konten_promo }}</textarea>
                                    <div class="invalid-feedback">Keterangan konten wajib diisi.</div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label required">Poster Kegiatan</label>
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
                                        File yang diizinkan jpeg, png, jpg, gif, svg (Maks 5 MB)
                                    </small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label required">Tanggal Mulai Promo</label>
                                <div class="col-sm-4">
                                <input type="date" name="tanggal_mulai_promo" class="form-control" value="{{ $kegiatan->tanggal_mulai_promo }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label required">Tanggal Berakhir Promo</label>
                                <div class="col-sm-4">
                                <input type="date" name="tanggal_selesai_promo" class="form-control" value="{{ $kegiatan->tanggal_selesai_promo }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label required">Status</label>
                                <div class="col-sm-4">
                                
                                <select name="status" class="form-control" id="status" required>
                                    <option value="1" {{ $kegiatan->status == 1 ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ $kegiatan->status == 0 ? 'selected' : '' }}>Nonaktif</option>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer mt-3">
                            <a class="btn btn-secondary btn-sm mr-1" href="{{url('/kegiatan/daftarKegiatan')}}" role="button">
                            <i class="fa fa-angle-left"></i>&nbsp;Kembali</a>
                            <button type="submit" class="btn btn-primary btn-sm mr-2 float-right">Simpan</button>
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
              height : 300,
              width : 700,
              placeholder : 'Masukkan konten disini',
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

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() 
{
    // Fungsi untuk menambahkan "Rp" jika belum ada
    function formatRupiah(harga_promo) 
    {
        if (harga_promo.indexOf('Rp.') === -1) 
        {
            return 'Rp. ' + harga_promo;
        }
        return harga_promo;
    }

    // Ketika nilai input harga promo berubah
    $('input[name="harga_promo"]').on('input', function() 
    {
        // Ambil nilai input harga promo
        var harga_promo = $(this).val();
        // Tambahkan "Rp" jika belum ada
        harga_promo = formatRupiah(harga_promo);
        // Set nilai kembali ke input
        $(this).val(harga_promo);
    });

    // Jika input harga promo sudah memiliki nilai, pastikan tetap terformat dengan "Rp"
    $('input[name="harga_promo"]').each(function() 
    {
        var harga_promo = $(this).val();
        $(this).val(formatRupiah(harga_promo));
    });
});
</script>
