<title>Tambah Kegiatan</title>

@extends('layout.main')
@section('content')
 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">

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
                <h3 class="card-title">FORM PENAMBAHAN KEGIATAN</h3>
              </div>
              <!-- /.card-header -->

    <form class="form-horizontal needs-validation" 
      action="{{url('/kegiatan/tambahKegiatan')}}"
      method="post"
      enctype="multipart/form-data" 
      novalidate>
    @csrf <!-- Token CSRF untuk keamanan -->

    <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label required">Paket Kegiatan</label>
                <div class="col-sm-4">
                  <select id="paket_kegiatan_id" name="paket_kegiatan_id" class="form-control" required>
                    <option value="">Pilih Paket Kegiatan</option>
                    @foreach($paketKegiatan as $kegiatan)
                    <option value="{{ $kegiatan->id }}">{{ $kegiatan->nama }}</option>
                    @endforeach
                  </select>
                  <div class="invalid-feedback">Business Line wajib diisi.</div>
                </div>
              </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label required">Nama Kegiatan</label>
                    <div class="col-sm-4">
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Kegiatan" required>
                    <div class="invalid-feedback">Nama kegiatan wajib diisi.</div>
                    </div>
            </div>

            <div class="form-group row">
                    <label class="col-sm-2 col-form-label required">Harga Kegiatan</label>
                    <div class="col-sm-4">
                    <div class="input-group">
                    <div class="input-group-prepend">
                    </div>
                    <input type="text" name="harga" class="form-control" placeholder="Masukkan Harga Kegiatan" required>
                        <div class="invalid-feedback">Harga kegiatan wajib diisi.</div>
                    </div>
                    </div>
            </div>

            <div class="form-group row">
                        <label class="col-sm-2 col-form-label required">Isi Konten</label>
                        <div class="col-sm-9">
                              <textarea id="summernote" name="konten" class="form-control" placeholder="Masukkan Keterangan Konten" required></textarea>
                              <div class="invalid-feedback">Konten wajib diisi.</div>
                        </div>
                    </div>

                <div class="form-group row">
                <label class="col-sm-2 col-form-label required">Poster Kegiatan</label>
                <div class="col-sm-4">
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="gambar" name="gambar" accept="image/*">
                      <label class="custom-file-label" for="gambar">Pilih gambar</label>
                    </div>
                  </div>
                  <div class="invalid-feedback">Poster wajib diunggah.</div>
                  <small id="fileHelp" class="form-text text-muted">File yang diizinkan jpeg, png, jpg, gif, svg (Maks 5 MB)</small>
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
  <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection


@section('tail')
    <!-- Load Summernote CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
            $('#summernote').summernote({
              height : 300,
              width : 800,
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
     $(document).ready(function(){
        // Fungsi untuk menambahkan "Rp" jika belum ada
        function formatRupiah(harga) {
            if (harga.indexOf('Rp.') === -1) {
                return 'Rp. ' + harga;
            }
            return harga;
        }

        // Ketika nilai input harga berubah
        $('input[name="harga"]').on('input', function(){
            // Ambil nilai input harga
            var harga = $(this).val();
            // Tambahkan "Rp" jika belum ada
            harga = formatRupiah(harga);
            // Set nilai kembali ke input
            $(this).val(harga);
        });

        // Jika input harga sudah memiliki nilai, pastikan tetap terformat dengan "Rp"
        $('input[name="harga"]').each(function(){
            var harga = $(this).val();
            $(this).val(formatRupiah(harga));
        });
    });
</script>