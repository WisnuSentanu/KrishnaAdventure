<title>Detail Pembayaran</title>

@extends('layout.main')

@section('head')
  <meta name="csrf-token" content="{{ csrf_token() }}" />

@endsection

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Pesan error validasi -->
        @if($errors->any())
        <div class="row">
            <div class="col-lg-6">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><b>Kesalahan!</b></h5>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif

        <!-- Invoice -->
        <div class="invoice p-3 mb-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-header">
                        <h3 class="card-title text-center">DETAIL PEMBAYARAN</h3>
                    </div>
                    <br>
                    @if ($pemesanan && $pemesanan->count() > 0)
                        @foreach($pemesanan as $item)
                            @php
                                $statusTransaksi = $item->status;
                            @endphp
                            <div class="float-right">
                            @if ($statusTransaksi == 0)
                                <span class="badge badge-primary">Menunggu Konfirmasi Pembayaran</span>
                            @elseif ($statusTransaksi == 1)
                                <span class="badge badge-success">Pembayaran Terkonfirmasi</span>
                            @elseif ($statusTransaksi == 2)
                                <span class="badge badge-danger">Pembayaran Tidak Sesuai</span>
                            @else
                                <span class="badge badge-secondary">Status Tidak Diketahui</span>
                            @endif
                        @endforeach
                    @endif
                            </div>
                    <br><br>
                </div>
            </div>

            <!-- Tabel Detail Pembayaran -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>EMAIL</th>
                                <th>NO TELP</th>
                                <th>TANGGAL PEMESANAN</th>
                                <th>KEGIATAN</th>
                                <th>BUKTI PEMBAYARAN</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp   
                        @foreach($pemesanan as $item)
                            <tr class="text-center">
                                <td>{{$no++}}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->no_telepon }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->kegiatan->nama }}</td>
                                <td>
                                    @if($item->receipt_path)
                                        <a href="{{ asset('storage/' . $item->receipt_path) }}" download class="btn btn-info btn-sm" title="Download Bukti Pembayaran">
                                            <i class="fas fa-download"></i> Download
                                        </a>
                                    @else
                                        <span>Tidak ada bukti pembayaran</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tombol Konfirmasi dan Tolak -->
            <div class="row mt-3">
                <div class="col-12">
                    <a class="btn btn-secondary btn-sm mr-2" href="{{url('/pembayaran/verifikasiPembayaran')}}" role="button">
                        <i class="fa fa-angle-left"></i>&nbsp;Kembali
                    </a>

                    @if ($item->status == 0)
                        <button type="button" class="btn btn-primary btn-sm float-right ml-2" onclick="konfirmasiPembayaran('{{ $item->id }}')" title="Konfirmasi Pembayaran">
                            <i class="fas fa-check"></i>&nbsp;&nbsp;&nbsp;Approve
                        </button>

                        <button type="button" class="btn btn-danger btn-sm float-right" onclick="tolakPembayaran('{{ $item->id }}')" title="Tolak Pembayaran">
                            <i class="fas fa-times"></i>&nbsp;&nbsp;&nbsp;Tolak Pembayaran
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Konfirmasi -->
<div class="modal fade" id="modal_konfirmasi_pembayaran">
    <div class="modal-dialog">
        <div class="modal-content" id="isi_modal_konfirmasi_pembayaran">
            <!-- isi modal dari js -->
        </div>
    </div>
</div>

<!-- Modal Tolak Pembayaran -->
<div class="modal fade" id="modal_tolak_pembayaran">
    <div class="modal-dialog">
        <div class="modal-content" id="isi_modal_tolak_pembayaran">
            <!-- Konten Modal akan dimuat melalui JavaScript -->
        </div>
    </div>
</div>
@endsection

@section('tail')
<script type="text/javascript">
function konfirmasiPembayaran(id) {
    $('#isi_modal_konfirmasi_pembayaran').empty();

    var html = '<form id="form-konfirmasi" action="{{ url('/pembayaran/konfirmasi') }}" method="post">';
    html += '@csrf';
    html += '<div class="modal-body">';
    html += '<p><center>Apakah anda ingin mengkonfirmasi pembayaran ini?</center></p>';
    html += '<input type="hidden" name="id" value="' + id + '">';
    html += '</div>';
    html += '<div class="modal-footer justify-content-between">';
    html += '<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-angle-left"></i>&nbsp;Kembali</button>';
    html += '<button type="submit" class="btn btn-primary">Ya</button>';
    html += '</div>';
    html += '</form>';

    $('#isi_modal_konfirmasi_pembayaran').append(html);
    $('#modal_konfirmasi_pembayaran').modal('show');
}

function tolakPembayaran(id) {
    $('#isi_modal_tolak_pembayaran').empty();

    var html = '<form id="form-tolak" action="{{ url('/bayar/tolak') }}" method="post">';
    html += '@csrf';
    html += '<div class="modal-body">';
    html += '<p><center>Apakah anda yakin ingin menolak pembayaran ini?</center></p>';
    html += '<input type="hidden" name="id" value="' + id + '">';
    html += '</div>';
    html += '<div class="modal-footer justify-content-between">';
    html += '<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-angle-left"></i>&nbsp;Kembali</button>';
    html += '<button type="submit" class="btn btn-danger">Tolak</button>';
    html += '</div>';
    html += '</form>';

    $('#isi_modal_tolak_pembayaran').append(html);
    $('#modal_tolak_pembayaran').modal('show');
}
</script>
@endsection
