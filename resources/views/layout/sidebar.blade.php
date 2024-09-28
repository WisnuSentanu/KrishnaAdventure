<script src="{{ asset('js/notifications.js') }}"></script>
<!-- Main Sidebar Container -->

<aside class="main-sidebar sidebar-dark-primary elevation-4">



<!-- <a href="{{ url('/') }}" class="brand-link">
  <img src="{{asset('dist/img/ap-logo-sekunder.png')}}" alt="logo" class="" style="width:220px;height:50px;">
</a> -->
<div class="sidebar">
<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
<li class="nav-header">NAVIGATION</li>


<li class="nav-item">
 <a href="{{url('/')}}" class="nav-link">
       <i class="fas fa-home nav-icon"></i>
           <p>Halaman Utama</p>
      </a>
    </li>

    <li class="nav-item @if($menu == 'Dashboard') menu-open @endif">
        <a href="#" class="nav-link @if($menu == 'Dashboard') active @endif">
          <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard<i class="right fas fa-angle-left"></i></p>
        </a>

  <ul class="nav nav-treeview">

  @if(session()->get('role_id') == 1)
    <li class="nav-item">
        <a href="{{ url('/admin/dashboard') }}" class="nav-link @if($page == 'Overview') active @endif">
            <i class="far fa-circle nav-icon"></i>
            <p>Overview<span class="badge badge-success right"></span></p>
        </a>
    </li>
@endif
</ul>
</li>



@if(session()->get('role_id') == 1)
    <li class="nav-item">
        <a href="{{ url('/kegiatan/daftarKegiatan') }}" class="nav-link @if($page == 'Daftar Kegiatan') active @endif">
            <i class="nav-icon fas fa-users"></i>
            <p>Kelola Kegiatan</p>
        </a>
    </li>
@endif

<!-- @if(session()->get('role_id') == 1)
    <li class="nav-item">
        <a href="{{ url('/promosi/daftarPromosi') }}" class="nav-link @if($page == 'Daftar Promosi') active @endif">
            <i class="nav-icon fas fa-users"></i>
            <p>Promosi</p>
        </a>
    </li>
@endif -->

@if(session()->get('role_id') == 1)
    <li class="nav-item">
        <a href="{{ url('/pembayaran/verifikasiPembayaran') }}" class="nav-link @if($page == 'Daftar Pembayaran') active @endif">
            <i class="nav-icon fas fa-user-check"></i>
            @if($badgeNotif['pemesanan'] !=null && $badgeNotif['pemesanan'] > 0)
         <p>Verifikasi Pembayaran <span class="badge badge-success right">{{ $badgeNotif['pemesanan'] }}</span></p>

      @else
        <p>Verifikasi Pembayaran</p>
      @endif
        </a>
    </li>
@endif

<!-- @if(session()->get('role_id') == 1)
    <li class="nav-item">
        <a href="{{ url('/pembayaran/verifikasiPembayaran') }}" class="nav-link @if($page == 'Daftar Pembayaran') active @endif">
            <i class="nav-icon fas fa-history"></i>
            <p>Verifikasi Pembayaran</p>
        </a>
    </li>
@endif -->

<!-- agar menu terakhir tidak tertutup -->
<li class="nav-item">
            <a class="nav-link"></a>
          </li>

</nav>
</div>
</aside>