<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Place To Stay</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7CPoppins:400%7CTeko:300,400">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/fonts.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
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

      <!-- Swiper-->
      <section class="section swiper-container swiper-slider swiper-slider-corporate swiper-pagination-style-2" data-loop="true" data-autoplay="5000" data-simulate-touch="true" data-nav="false" data-direction="vertical">
        <div class="swiper-wrapper text-left">
          <div class="swiper-slide context-dark" data-slide-bg="assets/images/slider1.jpg">
            <div class="swiper-slide-caption section-md">
              <div class="container">
                <div class="row">
                  <div class="col-md-10">
                  <h2 class="oh font-weight-light" data-caption-animate="slideInUp" data-caption-delay="100"><span class="font-weight-bold">Place To Stay</span></h2>
                    <h6 class="text-uppercase" data-caption-animate="fadeInRight" data-caption-delay="0">Choose Package to Seafaring Excursions on Enchanting Waters.</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Swiper Pagination-->
        <div class="swiper-pagination"></div>
      </section>

    <!-- Marine Adventure -->
      @if($placeStay->isNotEmpty())
<section class="section section-sm bg-default">
    <div class="container">
        <div class="row row-sm row-40 row-md-50">
            @foreach($placeStay as $kegiatan)
            <div class="col-6 col-md-4 col-lg-3 wow fadeInRight">
                <!-- Product Big -->
                <article class="product-big" style="display: flex; flex-direction: column; height: 130%;">
                    <div class="unit flex-column align-items-stretch" style="flex-grow: 1;">
                        <!-- Gambar berada di atas -->
                        <div class="unit-left" style="overflow: hidden;">
                            <a class="product-big-figure" href="#" data-toggle="modal" data-target="#modalMarine{{ $kegiatan->id }}">
                                <img src="{{ asset('storage/' . $kegiatan->gambar_path) }}" alt="" class="img-fluid" style="max-height: 200px; width: 100%; object-fit: cover;" />
                            </a>
                        </div>

                        <!-- Konten di bawah gambar -->
                        <div class="unit-body" style="flex-grow: 1; display: flex; flex-direction: column;">
                            <div class="product-big-body">
                                <!-- Nama Kegiatan -->
                                <h5 class="product-big-title" style="font-size: 0.9rem; margin: 5px 0;">{{ $kegiatan->nama }}</h5>
                                
                                <!-- Garis di bawah nama kegiatan -->
                                <hr style="border: 1px solid #ddd; margin: 5px 0;">

                                <!-- Rating Bintang -->
                                <div class="product-rating mt-2">
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="product-rating-font">
                                        <span>(5.0)</span>
                                    </div>
                                </div>

                                <!-- Harga -->
                                <div class="product-big-price-wrap mt-0">
                                    @if($kegiatan->tanggal_mulai_promo && $kegiatan->tanggal_selesai_promo && \Carbon\Carbon::now()->between($kegiatan->tanggal_mulai_promo, $kegiatan->tanggal_selesai_promo))
                                    <span class="product-big-price" style="font-size: 0.9rem; color: #000; text-decoration: line-through;">
                                            <s>{{ $kegiatan->harga }}</s> <!-- Harga asli dicoret -->
                                    </span>
                                    <span class="product-big-price" style="font-size: 1rem; font-weight: bold; color: #fff; margin-left: 5px;">
                                            {{ $kegiatan->harga_promo }} <!-- Harga promo ditampilkan -->
                                    </span>
                                    @else
                                    <span class="product-big-price" style="font-size: 1rem; font-weight: bold;">
                                            {{ $kegiatan->harga }} <!-- Tampilkan harga asli jika tidak ada promo -->
                                        </span>
                                    @endif
                                </div>

                                <!-- Tombol Buy This Tour di bawah harga -->
                                <div class="text-center mt-2">
                                  <a class="button button-black-outline button-ujarak" href="{{ route('place.show', $kegiatan->id) }}" style="font-size: 0.8rem;">Book This Activity</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <br />
            </div>

            <!-- Modal untuk gambar -->
            <div class="modal fade" id="modalMarine{{ $kegiatan->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabelMarine{{ $kegiatan->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabelMarine{{ $kegiatan->id }}">{{ $kegiatan->nama }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <img src="{{ asset('storage/' . $kegiatan->gambar_path) }}" alt="" class="img-fluid"/>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
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
    <script src="assets/js/core.min.js"></script>
    <script src="assets/js/script.js"></script>
  </body>
</html>