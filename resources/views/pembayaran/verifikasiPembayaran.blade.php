<title>Verifikasi Pembayaran</title>

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
                <h3 class="card-title">VERIFIKASI PEMBAYARAN</h3>
              <!-- /.card-header -->
<br></br>
              <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped table-sm">
                  <thead>
                    <tr class="table-condensed">
                   <th style="width: 10px" class="sticky-top"><center>NO</center></th>
                          <th><center>NAMA</center></th>
                          <th><center>EMAIL</center></th>
                          <th><center>NO TELP</center></th>
                          <th><center>TANGGAL PEMESANAN</center></th>
                          <th><center>KEGIATAN</center></th>
                          <th><center>BUKTI PEMBAYARAN</center></th>
                          <th><center>STATUS</center></th>
                          <th><center>OPTION</center></th>
                    </tr>
                  </thead>
                  <tbody>
                  @php $no=1; @endphp
                  @foreach($pemesanan as $item)
                    <tr class="table-condensed">
                      <td><center>{{$no++}}</center></td>
                      <td><center>{{ ($item->nama) }}</center></td>
                      <td><center>{{ ($item->email) }}</center></td>
                      <td><center>{{ ($item->no_telepon) }}</center></td>
                      <td><center>{{ ($item->tanggal) }}</center></td>
                      <td><center>{{ ($item->kegiatan->nama) }}</center></td>
                      <td><center>
                          @if($item->receipt_path)
                          <a href="{{ asset('storage/' . $item->receipt_path) }}" download class="btn btn-info btn-sm" title="Download Bukti Pembayaran">
                              <i class="fas fa-download"></i> Download
                          </a>

                          @else
                              <span>Tidak ada bukti pembayaran</span>
                          @endif
                      </center></td>
                      <td>
                      <center>
                          @if ($item->status == 0)
                            <span class="badge badge-primary">Menunggu Konfirmasi Pembayaran</span>
                          @elseif ($item->status == 1)
                            <span class="badge badge-success">Pembayaran Terkonfirmasi</span>
                          @elseif ($item->status == 2)
                            <span class="badge badge-danger">Pembayaran Tidak Sesuai</span>
                          @else
                            <span class="badge badge-secondary">Status Tidak Diketahui</span>
                          @endif
                        </center>
                      </td>
                      <td><center>          
                      <a class="btn btn-secondary btn-sm" href="{{ route('detail.pembayaran', ['id' => $item->id]) }}" role="button" title="Lihat Detail">
                          <i class="fas fa-angle-double-right"></i>
                      </a>
                      </center></td>
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
  @if (session()->get('notif') == 'konfirmasi_sukses')
      $(document).Toasts('create', {
          class: 'bg-success',
          title: 'Sukses!',
          body: 'Berhasil konfirmasi pembayaran.'
        })
    @elseif(session()->get('notif') == 'konfirmasi_gagal')
      $(document).Toasts('create', {
          class: 'bg-danger',
          title: 'Error!',
          body: 'Gagal konfirmasi pembayaran.'
        })
    @elseif(session()->get('notif') == 'tolak_sukses')
      $(document).Toasts('create', {
          class: 'bg-success',
          title: 'Sukses!',
          body: 'Berhasil menolak pembelian.'
        })
    @elseif(session()->get('notif') == 'tolak_gagal')
      $(document).Toasts('create', {
          class: 'bg-danger',
          title: 'Error!',
          body: 'Gagal menolak pembelian.'
        })
    @endif
  @endif
</script>
@endsection