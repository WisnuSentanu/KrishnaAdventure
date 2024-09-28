<title>Dashboard Admin</title>

@extends('layout.main')


@section('content')
  <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <div class="row">

              <div class="col-lg-2 col-6">            
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                  <h3>{{$totalKegiatan}}</h3>
                    <p>TOTAL KEGIATAN</p>
                  </div>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                  <h3>{{$totalPromosi}}</h3>
                    <p>TOTAL PROMOSI</p>
                  </div>
                </div>
              </div>
              <!-- ./col -->

              <div class="col-lg-3 col-6"> 
                <!-- small box -->
                <div class="small-box" style="background-color:#21618c ; color:white"> 
                  <div class="inner">
                  <h3>{{$totalPesanan}}</h3>
                    <p>TOTAL PESANAN</p>  
                  </div>
                </div>
              </div>
              <!-- ./col --> 
            </div>

            <div class="row">
              
              <div class="col-md-12">

                <div class="card">

                  <div class="card-header">
                    <h5 class="card-title">STATUS PEMBAYARAN</h5>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">

                    <div class="row">

                      <div class="col-md-6">

                        <!-- /.progress-group -->
                        <div class="progress-group">
                          <span class="progress-text">Pembayaran Belum di Verifikasi</span>
                          <span class="float-right"><b>{{$totalPembayaranBelumVerifikasi}}</b>/20</span>
                          <div class="progress progress-sm">
                            <div style="width: 500px; height: 10px;">
                              <div style="background-color: #75c5f0; width: {{$totalPembayaranBelumVerifikasi}}%; height: 100%;"></div>
                            </div>
                          </div>
                        </div>
                        <!-- /.progress-group -->

                        <div class="progress-group">
                          <span class="progress-text">Pembayaran Sudah di Verifikasi</span>
                          <span class="float-right"><b>{{$totalPembayaranSudahVerifikasi}}</b>/20</span>
                          <div class="progress progress-sm">
                            <div style="width: 500px; height: 10px;">
                              <div style="background-color:#84c424; width: {{$totalPembayaranSudahVerifikasi}}%; height: 100%;"></div>
                            </div>
                          </div>
                        </div>

                        <div class="progress-group">
                          <span class="progress-text">Pembayaran Ditolak</span>
                          <span class="float-right"><b>{{$totalPembayaranDitolak}}</b>/20</span>
                          <div class="progress progress-sm">
                            <div style="width: 500px; height: 10px;">
                              <div style="background-color:#FF1E1E; width: {{$totalPembayaranDitolak}}%; height: 100%;"></div>
                            </div>
                          </div>
                        </div>

                        </div>
                    <!-- /.col -->

                  </div>
                  <!-- /.row -->

                </div>
                <!-- /.card -->

              </div>
              </div>
            </div>
      </div>
    </section>
    @endsection
