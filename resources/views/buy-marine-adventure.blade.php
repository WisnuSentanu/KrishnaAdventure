<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Buy Marine Adventure Activity</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">

    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7CPoppins:400%7CTeko:300,400">
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/fonts.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
  </head>
  <body>
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container">
          <div class="cssload-speeding-wheel"></div>
        </div>
        <p>Loading...</p>
      </div>
    </div>
    <div class="page">
    <header class="custom-header section page-header">
  <nav class="custom-navbar custom-navbar-corporate" data-layout="custom-navbar-fixed">
    <div class="custom-navbar-main">
      <div class="custom-navbar-nav-wrap">
        <ul class="custom-navbar-nav">
          <li class="custom-nav-item {{ $page === 'home' ? 'active' : '' }}">
            <a class="custom-nav-link" href="{{ url('/') }}">Home</a>
          </li>
          <li class="custom-nav-item {{ $page === 'marine' ? 'active' : '' }}">
            <a class="custom-nav-link" href="{{ url('/Marine-Adventure') }}">Marine Adventure</a>
          </li>
          <li class="custom-nav-item {{ $page === 'land' ? 'active' : '' }}">
            <a class="custom-nav-link" href="{{ url('/Land-Adventure') }}">Land Adventure</a>
          </li>
          <li class="custom-nav-item {{ $page === 'transport' ? 'active' : '' }}">
            <a class="custom-nav-link" href="{{ url('/Transport-Tour') }}">Transport & Tour</a>
          </li>
          <li class="custom-nav-item {{ $page === 'place' ? 'active' : '' }}">
            <a class="custom-nav-link" href="{{ url('/Place-To-Stay') }}">Place To Stay</a>
          </li>
          <li class="custom-nav-item {{ $page === 'contact' ? 'active' : '' }}">
            <a class="custom-nav-link" href="{{ url('/Contact-Us') }}">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>


<!-- <ul class="list-inline rd-navbar-corporate-list-social">
              <li><a class="icon fa fa-facebook" href="#"></a></li>
              <li><a class="icon fa fa-twitter" href="#"></a></li>
              <li><a class="icon fa fa-google-plus" href="#"></a></li>
              <li><a class="icon fa fa-instagram" href="#"></a></li>
            </ul> -->

    <!-- Marine Adventure -->
    <section class="section section-sm bg-default">
  <div class="container">
    <div class="row">
      <!-- Konten Utama (Sisi Kiri) -->
      <div class="col-lg-8">
        <div class="left-aligned">
          <img src="{{ asset('storage/' . $kegiatan->gambar_path) }}" alt="{{ $kegiatan->nama }}" class="img-fluid mb-4" style="max-height: 400px; object-fit: cover;">
        </div>
        <h4 class="left-aligned mb-3">{{ $kegiatan->nama }}</h4>
        <br>
        <div class="left-aligned mb-4">
            @if($kegiatan->tanggal_mulai_promo && $kegiatan->tanggal_selesai_promo && \Carbon\Carbon::now()->between($kegiatan->tanggal_mulai_promo, $kegiatan->tanggal_selesai_promo))
                <p>{{--{{($kegiatan->konten_promo)}}--}} {!!($kegiatan->konten_promo)!!}</p>
            @else
                <p>{{--{{($kegiatan->konten)}}--}} {!!($kegiatan->konten)!!}</p>
            @endif
        </div>
        <div class="left-aligned mb-3">
                  @if($kegiatan->tanggal_mulai_promo && $kegiatan->tanggal_selesai_promo && \Carbon\Carbon::now()->between($kegiatan->tanggal_mulai_promo, $kegiatan->tanggal_selesai_promo))
                    <span class="product-big-price" style="font-size: 0.9rem; color: #999; text-decoration: line-through;">
                        <s>{{ $kegiatan->harga }}</s> <!-- Harga asli dicoret -->
                    </span>
                    <span class="product-big-price" style="font-size: 1rem; font-weight: bold; color: #000; margin-left: 5px;">
                          {{ $kegiatan->harga_promo }} <!-- Harga promo ditampilkan -->
                    </span>
                  @else
                    <span class="product-big-price" style="font-size: 1rem; font-weight: bold; color: #000; margin-left: 5px;">
                          {{ $kegiatan->harga }} <!-- Tampilkan harga asli jika tidak ada promo -->
                    </span>
                  @endif
              </div>
        <div class="text-left">
          <button id="bookButton" class="btn btn-primary">Book This Activity</button>
        </div>
        <div id="bookingForm" class="mt-4" style="display: none;">
          <form action="{{ route('booking.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="nama">Name</label>
              <input type="text" id="nama" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="no_telepon">Phone Number</label>
              <input type="tel" id="no_telepon" name="no_telepon" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="tanggal">Booking Date</label>
              <input type="date" id="tanggal" name="tanggal" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="payment_proof">Payment Proof</label>
              <input type="file" id="payment_proof" name="payment_proof" class="form-control-file" required>
            </div>
            <input type="hidden" name="kegiatan_id" value="{{ $kegiatan->id }}">
            <br>
            <div class="text-left">
              <button type="submit" class="btn btn-success">Submit Booking</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Recent Related Post (Sisi Kanan) -->
      <div class="col-lg-4">
    <div class="recent-related-posts">
        <h4>Recent Related Posts</h4>
        <ul class="list-unstyled">
            @foreach($relatedKegiatan as $related)
            <li style="margin-bottom: 15px;">
                <div class="d-flex align-items-center">
                    <!-- Gambar di sebelah kiri -->
                    <div class="related-post-image" style="flex-shrink: 0;">
                        <a href="{{ route('land.show', $related->id) }}">
                            <img src="{{ asset('storage/' . $related->gambar_path) }}" alt="" class="img-fluid" style="max-height: 60px; width: 60px; object-fit: cover; border-radius: 4px;" />
                        </a>
                    </div>

                    <!-- Nama Kegiatan di sebelah kanan gambar -->
                    <div class="related-post-content" style="margin-left: 10px; flex-grow: 1;">
                        <h5 class="product-big-title" style="font-size: 0.9rem; margin: 0;">
                            <a href="{{ route('land.show', $related->id) }}" style="color: #000; text-decoration: none;">
                                {{ $related->nama }}
                            </a>
                        </h5>
                    </div>
                </div>

                <!-- Garis pemisah -->
                <hr style="border: 1px solid #ddd; margin-top: 10px; margin-bottom: 10px;">
            </li>
            @endforeach
        </ul>
    </div>
</div>
    </div>
  </div>
</section>
        

      <footer class="footer-corporate context-dark">
        <!-- Footer omitted for brevity -->
      </footer>
    </div>

    <!-- Javascript -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script>
      document.getElementById('bookButton').addEventListener('click', function () {
        document.getElementById('bookingForm').style.display = 'block';
        this.style.display = 'none';
      });
    </script>
  </body>
</html>
<br></br>
<br></br>
<footer class="section footer-corporate context-dark">
        <div class="footer-corporate-inset">
          <div class="container">
            <div class="row row-40 justify-content-lg-between">
              <div class="col-sm-6 col-md-12 col-lg-3 col-xl-4">
                <div class="oh-desktop">
                  <div class="wow slideInRight" data-wow-delay="0s">
                    <h6 class="text-spacing-100 text-uppercase">Contact us</h6>
                    <ul class="footer-contacts d-inline-block d-sm-block">
                      <li>
                        <div class="unit">
                          <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                          <div class="unit-body"><a class="link-phone" href="tel:#">+1 323-913-4688</a></div>
                        </div>
                      </li>
                      <li>
                        <div class="unit">
                          <div class="unit-left"><span class="icon fa fa-envelope"></span></div>
                          <div class="unit-body"><a class="link-aemail" href="mailto:#">info@demolink.org</a></div>
                        </div>
                      </li>
                      <li>
                        <div class="unit">
                          <div class="unit-left"><span class="icon fa fa-location-arrow"></span></div>
                          <div class="unit-body"><a class="link-location" href="#">4730 Crystal Springs Dr, Los Angeles, CA 90027</a></div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-5 col-lg-3 col-xl-4">
                <div class="oh-desktop">
                  <div class="wow slideInDown" data-wow-delay="0s">
                    <h6 class="text-spacing-100 text-uppercase">Our Social Media</h6>
                    <br></br>
                    <!-- Post Minimal 2-->
                    <ul class="list-inline list-inline-sm footer-social-list-2">
                    <li><a class="icon fa fa-facebook" href="#"></a></li>
                    <li><a class="icon fa fa-twitter" href="#"></a></li>
                    <li><a class="icon fa fa-google-plus" href="#"></a></li>
                    <li><a class="icon fa fa-instagram" href="#"></a></li>
                  </ul>
                  </div>
                </div>
              </div>
              <div class="col-sm-11 col-md-7 col-lg-5 col-xl-4">
                <div class="oh-desktop">
                  <div class="wow slideInLeft" data-wow-delay="0s">
                    <h6 class="text-spacing-100 text-uppercase">Quick links</h6>
                    <ul class="row-6 list-0 list-marked list-marked-md list-marked-secondary list-custom-2">
                      <li><a href="{{ url('/') }}">Home</a></li>
                      <li><a href="{{ url('/Marine-Adventure') }}">Marine Adventure</a></li>
                      <li><a href="{{ url('/Land-Adventure') }}">Land Adventure</a></li>
                      <li><a href="{{ url('/Transport-Tour') }}">Transport & Tour</a></li>
                      <li><a href="{{ url('/Place-To-Stay') }}">Place To Stay</a></li>
                      <li><a href="{{ url('/Contact-Us') }}">Contact</a></li>
                    </ul>
                    <div class="group-md group-middle justify-content-sm-start"><a class="button button-lg button-primary button-ujarak" href="{{ url('/') }}">Home</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-corporate-bottom-panel">
          <div class="container">
            <div class="row justfy-content-xl-space-berween row-10 align-items-md-center2">
              <div class="col-sm-6 col-md-7 order-sm-first">
                <!-- Rights-->
                <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span>&nbsp;</span><span>Krishna Menjangan Adventure</span>. All Rights Reserved.</p>
              </div>
              <div class="col-sm-6 col-md-4 text-md-right">
                <p class="rights"><a href="#">Privacy Policy</a></p>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="{{ asset('assets/js/core.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
  </body>
</html>