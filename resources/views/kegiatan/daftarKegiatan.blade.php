<title>Daftar Kegiatan</title>

@extends('layout.main')

@section('head')
  <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

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
                  <h5><b></b>Kesalahan !</b></h5>
                  <ul>
  @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
  @endforeach
                  </ul>
                </div>
          </div>
        </div>
@endif
<!-- Small boxes (Stat box) -->
<div class="row">
          <div class="col-lg-12 col-6">
            
            <div class="card">
              <div class="card-header">
              <h3 class="card-title">DAFTAR KEGIATAN</h3>
<br>
                        <a class="btn btn-info btn-sm float-right"
                           href="{{ url('/kegiatan/tambahKegiatan')}}"
                           role="button">
                            <i class="fa fa-plus"></i>&nbsp;&nbsp; Tambah Kegiatan
                        </a>
              <!-- /.card-header -->
<br></br>
              <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped">
                  <thead>
                    <tr class="table-condensed">
                   <th style="width: 10px" class="sticky-top"><center>NO</center></th>
                          <th><center>NAMA KEGIATAN</center></th>
                          <th><center>HARGA</center></th>
                          <th><center>KONTEN</center></th>
                          <th><center>PAKET KEGIATAN</center></th>
                          <th><center>TGL MULAI & BERAKHIR PROMO</center></th>
                          <th><center>PROMO</center></th>
                          <th><center>OPTION</center></th>
                    </tr>
                  </thead>
                  <tbody>
                  @php $no=1; @endphp
                 @foreach($kegiatan as $item)
                  <tr class="table-condensed">
                    <td><center>{{$no++}}</center></td>
                    <td><center>{{strtoupper($item->nama)}}</center></td>
                    <td><center>{{strtoupper($item->harga)}}</center></td>
                    <td><center>{{ strtoupper(Str::limit(strip_tags($item->konten), 100, '...')) }}</center></td>
                    <td><center>{{strtoupper($item->paket_kegiatan->nama)}}</center></td>
                      <td>
                          <center>
                              @if ($item->tanggal_mulai_promo && $item->tanggal_selesai_promo)
                                  {{ \Carbon\Carbon::parse($item->tanggal_mulai_promo)->format('d-m-Y') }} s/d {{ \Carbon\Carbon::parse($item->tanggal_selesai_promo)->format('d-m-Y') }}
                              @else
                                  <span>-</span> <!-- Jika tidak ada tanggal, tampilkan tanda '-' -->
                              @endif
                          </center>
                      </td>
                      <td>
                          <center>
                              <div class="btn-group">
                              <a class="btn btn-secondary btn-sm px-1 py-1" 
                                  href="{{url('/kegiatan/tambahPromosi/'.$item->id)}}" 
                                  role="button"
                                  title="Daftar Promosi Kegiatan"
                                  style="font-size: 0.8rem; padding: 4px 8px;">
                                  Tambah & Edit Promosi
                                  </a>
                                  </div>
                          </center>
                      </td>
                    <td> 
                      <center>
                      <div class="d-flex justify-content-around">
                          <a class="btn btn-secondary btn-sm" href="{{url('/kegiatan/editKegiatan/'.$item->id)}}" role="button" title="Edit Seleksi">
                            <i class="fas fa-edit"></i>
                          </a>
                          <button class="btn btn-danger btn-sm" onclick="hapusKegiatan('{{ $item->id }}')" title="Hapus">
                            <i class="fas fa-trash-alt"></i>
                          </button>
                        </div>
                      </center>
                    </td>
                  </tr>
                @endforeach
                  </tbody>
                    
                </table>
              </div>
              </div>
            </div>
            <!-- /.card -->

          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
		
      </div><!-- /.container-fluid -->
      
    </section>
     <!-- /.content -->
    <!-- isi modal tombol hapus -->
    <div class="modal fade" id="modal_hapus">
        <div class="modal-dialog">
          <div class="modal-content" id="isi_modal_hapus">
            <!-- isi modal dari js -->
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    @endsection

    @section('tail')

<!-- notifikasi -->
<script type="text/javascript">
  @if (session()->has('notif'))
  @if (session()->get('notif') == 'simpan_sukses')
      $(document).Toasts('create', {
          class: 'bg-success',
          title: 'Sukses!',
          body: 'Data kegiatan berhasil disimpan.'
        })
    @elseif(session()->get('notif') == 'simpan_gagal')
      $(document).Toasts('create', {
          class: 'bg-danger',
          title: 'Error!',
          body: 'Gagal menyimpan data kegiatan.'
        })
    @elseif (session()->get('notif') == 'hapus_sukses')
      $(document).Toasts('create', {
          class: 'bg-success',
          title: 'Sukses!',
          body: 'Berhasil menghapus kegiatan.'
        })
    @elseif(session()->get('notif') == 'hapus_gagal')
      $(document).Toasts('create', {
          class: 'bg-danger',
          title: 'Error!',
          body: 'Gagal menghapus kegiatan.'
        })
    @elseif (session()->get('notif') == 'update_sukses')
      $(document).Toasts('create', {
          class: 'bg-success',
          title: 'Sukses!',
          body: 'Data kegiatan berhasil diperbarui.'
        })
      @elseif(session()->get('notif') == 'update_gagal')
      $(document).Toasts('create', {
          class: 'bg-danger',
          title: 'Error!',
          body: 'Data kegiatan gagal diperbarui.'
        })
      @elseif (session()->get('notif') == 'promo_sukses')
      $(document).Toasts('create', {
          class: 'bg-success',
          title: 'Sukses!',
          body: 'Berhasil menambahkan promo.'
        })
      @elseif(session()->get('notif') == 'promo_gagal')
      $(document).Toasts('create', {
          class: 'bg-danger',
          title: 'Error!',
          body: 'Gagal menambahkan promo.'
        })
    @endif
  @endif
</script>

<!-- javascript untuk menampilkan modal untuk menghapus konten seleksi -->
<script type="text/javascript">
    function hapusKegiatan(id) {
      //alert(id);
      $('#isi_modal_hapus').empty();;

            var url = "/kegiatan/hapusKegiatan/" + id;
            $('#isi_modal_hapus').empty();
            var html = '<form action="' + url + '" method="post">';
            html += '@csrf';
            html += '<div class="modal-body">';
            html += '<p><center>Apakah anda yakin ingin menghapus kegiatan ini?</center></p>';
            html += '<input type="text" name="id" value="'+id+'" hidden>';
            html += '</div>';
            html += '<div class="modal-footer justify-content-between">';
            html += '<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>';
            html += '<button type="submit" class="btn btn-danger float-right">Hapus</button>';
            html += '</div>';
            html += '</form>';

      $("#isi_modal_hapus").append(html);
      $("#modal_hapus").modal('show');  
    }
</script>
@endsection