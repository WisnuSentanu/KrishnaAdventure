<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Home</title>
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
                    <h6 class="text-uppercase" data-caption-animate="fadeInRight" data-caption-delay="0">Let's Book Your Trip With Us!</h6>
                    <h2 class="oh font-weight-light" data-caption-animate="slideInUp" data-caption-delay="100"><span>Menjangan</span><span class="font-weight-bold"> Island</span></h2><a class="button button-default-outline button-ujarak" href="{{ url('/Marine-Adventure') }}" data-caption-animate="fadeInLeft" data-caption-delay="0">Book Now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide context-dark" data-slide-bg="assets/images/slider2.jpg">
            <div class="swiper-slide-caption section-md">
              <div class="container">
                <div class="row">
                  <div class="col-md-10">
                    <h6 class="text-uppercase" data-caption-animate="fadeInRight" data-caption-delay="0">Get Best Memorable and Unfogettable Journey With Us!</h6>
                    <h2 class="oh font-weight-light" data-caption-animate="slideInUp" data-caption-delay="100"><span>Menjangan</span><span class="font-weight-bold"> Island</span></h2><a class="button button-default-outline button-ujarak" href="{{ url('/Contact-Us') }}" data-caption-animate="fadeInLeft" data-caption-delay="0">Contact Us</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide context-dark" data-slide-bg="assets/images/slider2.jpg">
            <div class="swiper-slide-caption section-md">
              <div class="container">
                <div class="row">
                  <div class="col-md-10">
                    <h6 class="text-uppercase" data-caption-animate="fadeInRight" data-caption-delay="0">Build your Next Holiday Trip with Us</h6>
                    <h2 class="oh font-weight-light" data-caption-animate="slideInUp" data-caption-delay="100"><span>Menjangan</span><span class="font-weight-bold"> Island</span></h2><a class="button button-default-outline button-ujarak" href="{{ url('/Transport-Tour') }}" data-caption-animate="fadeInLeft" data-caption-delay="0">Transport & Tour</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Swiper Pagination-->
        <div class="swiper-pagination"></div>
      </section>
      <!-- Section Box Categories-->
      <section class="section section-lg section-top-1 bg-gray-4">
        <div class="container offset-negative-1">
          <div class="box-categories cta-box-wrap">
            <div class="box-categories-content">
              <div class="row justify-content-center">
                <div class="col-md-4 wow fadeInDown col-9" data-wow-delay=".2s">
                  <ul class="list-marked-2 box-categories-list">
                    <li><a href="{{ url('/Marine-Adventure') }}"><img src="assets/images/marine.jpg" alt="" width="368" height="420"/></a>
                      <h5 class="box-categories-title">Marine Adventure</h5>
                    </li>
                  </ul>
                </div>
                <div class="col-md-4 wow fadeInDown col-9" data-wow-delay=".2s">
                  <ul class="list-marked-2 box-categories-list">
                    <li><a href="{{ url('/Land-Adventure') }}"><img src="assets/images/land.jpg" alt="" width="368" height="420"/></a>
                      <h5 class="box-categories-title">Land Adventure</h5>
                    </li>
                  </ul>
                </div>
                <div class="col-md-4 wow fadeInDown col-9" data-wow-delay=".2s">
                  <ul class="list-marked-2 box-categories-list">
                    <li><a href="{{ url('/Transport-Tour') }}"><img src="assets/images/transport.jpg" alt="" width="368" height="420"/></a>
                      <h5 class="box-categories-title">Transport & Tour</h5>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- Owl Carousel-->
        </div>
      </section>
      <!-- Discover New Horizons-->
      <section class="section section-sm section-first bg-default text-md-left">
        <div class="container">
          <div class="row row-50 align-items-center justify-content-center justify-content-xl-between">
            <div class="col-lg-6 text-center wow fadeInUp"><img src="assets/images/menjangan.jpg" alt="" width="556" height="382"/>
            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-delay=".1s">
              <div class="box-width-lg-470">
                <h3>Pemuteran Bali - Menjangan Island - West Bali National Park</h3>
                <!-- Bootstrap tabs-->
                <div class="tabs-custom tabs-horizontal tabs-line tabs-line-big tabs-line-style-2 text-center text-md-left" id="tabs-7">
                  <!-- Nav tabs-->
                  <ul class="nav nav-tabs">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-7-1" data-toggle="tab">About Menjangan</a></li>
                  </ul>
                  <!-- Tab panes-->
                  <div class="tab-content">
                      <div class="tab-pane fade show active" id="tabs-7-1">
                          <p style="text-align: justify;">
                              If you’re plan to visit Bali, don’t miss to put Pemuteran Menjangan on your bucket list. Pemuteran Village, Menjangan Island, and West Bali National Park form a region located at the western tip of Bali, approximately 4 hours from Ngurah Rai Airport and about 30 minutes from Gilimanuk Harbor. Pemuteran Village, Menjangan Island West Bali National Park is hidden Gem, these destinations is must visit for nature lovers who want to get away from the crowds.
                              These destination is widely known for its breathtaking underwater world and the diversity of flora and fauna in the West Bali National Park, it’s making favorite destination a must-visit when you are vacationing in Bali.
                          </p>
                          <div class="group-md group-middle">
                              <a class="button button-secondary button-pipaluk" href="{{ url('/Marine-Adventure') }}">Explore Tour Package</a>
                              <a class="button button-black-outline button-md" href="{{ url('/Contact-Us') }}">Contact Us</a>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--	Our Services-->
      <section class="section section-sm">
        <div class="container">
          <h3>Our Services</h3>
          <div class="row row-30">
            <div class="col-sm-6 col-lg-4">
              <article class="box-icon-classic">
                <div class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                  <div class="unit-left">
                    <div class="box-icon-classic-icon fl-bigmug-line-equalization3"></div>
                  </div>
                  <div class="unit-body">
                    <h5 class="box-icon-classic-title"><a href="#">Personalized Matching</a></h5>
                    <p class="box-icon-classic-text">Our unique matching system lets you find just the tour you want for your next holiday.</p>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-sm-6 col-lg-4">
              <article class="box-icon-classic">
                <div class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                  <div class="unit-left">
                    <div class="box-icon-classic-icon fl-bigmug-line-circular220"></div>
                  </div>
                  <div class="unit-body">
                    <h5 class="box-icon-classic-title"><a href="#">Wide Variety of Tours</a></h5>
                    <p class="box-icon-classic-text">We offer a wide variety of personally picked tours with destinations all over the globe.</p>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-sm-6 col-lg-4">
              <article class="box-icon-classic">
                <div class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                  <div class="unit-left">
                    <div class="box-icon-classic-icon fl-bigmug-line-favourites5"></div>
                  </div>
                  <div class="unit-body">
                    <h5 class="box-icon-classic-title"><a href="#">Highly Qualified Service</a></h5>
                    <p class="box-icon-classic-text">Our tour managers are qualified, skilled, and friendly to bring you the best service.</p>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-sm-6 col-lg-4">
              <article class="box-icon-classic">
                <div class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                  <div class="unit-left">
                    <div class="box-icon-classic-icon fl-bigmug-line-headphones32"></div>
                  </div>
                  <div class="unit-body">
                    <h5 class="box-icon-classic-title"><a href="#">24/7 Support</a></h5>
                    <p class="box-icon-classic-text">You can always get professional support from our staff 24/7 and ask any question you have.</p>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-sm-6 col-lg-4">
              <article class="box-icon-classic">
                <div class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                  <div class="unit-left">
                    <div class="box-icon-classic-icon fl-bigmug-line-hot67"></div>
                  </div>
                  <div class="unit-body">
                    <h5 class="box-icon-classic-title"><a href="#">Handpicked Hotels</a></h5>
                    <p class="box-icon-classic-text">Our team offers only the best selection of affordable and luxury hotels to our clients.</p>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-sm-6 col-lg-4">
              <article class="box-icon-classic">
                <div class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                  <div class="unit-left">
                    <div class="box-icon-classic-icon fl-bigmug-line-wallet26"></div>
                  </div>
                  <div class="unit-body">
                    <h5 class="box-icon-classic-title"><a href="#">Best Price Guarantee</a></h5>
                    <p class="box-icon-classic-text">If you find tours that are cheaper than ours, we will compensate the difference.</p>
                  </div>
                </div>
              </article>
            </div>
          </div>
        </div>
      </section>
      <section class="section bg-default text-center offset-top-50">
        <div class="parallax-container" data-parallax-img="images/parallax-1-1920x850.jpg">
          <div class="parallax-content section-xl section-inset-custom-1 context-dark bg-overlay-2-21">
            <div class="container">
              <h2 class="heading-2 oh font-weight-normal wow slideInDown"><span class="d-block font-weight-semi-bold">Pemuteran Beach</h2>
              <br>
              <h6><i>Also feature interesting spots to explore.</i></h6>
              <p class="text-width-medium text-spacing-75 wow fadeInLeft" data-wow-delay=".1s" style="text-align: justify;">
                  Pemuteran is true gem, offers beautiful beach clear sea water stunning blend of hills. Renowned for its commitment to coral reef and turtle conservation, Pemuteran Village has earned its reputation as a sustainable tourism destination.
              </p>
              </p><a class="button button-secondary button-pipaluk" href="{{ url('/Marine-Adventure') }}">More Activity</a>
            </div>
          </div>
        </div>
      </section>
      <!-- Marine Adventure -->
      @if($marineAdventure->isNotEmpty())
<section class="section section-sm bg-default">
    <div class="container">
        <h3 class="oh-desktop"><span class="d-inline-block wow slideInDown">Marine Adventure</span></h3>
        <p>Choose Package to Seafaring Excursions on Enchanting Waters.</p>
        <div class="row row-sm row-40 row-md-50">
            @foreach($marineAdventure as $kegiatan)
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
                                  <a class="button button-black-outline button-ujarak" href="{{ route('marine.show', $kegiatan->id) }}" style="font-size: 0.8rem;">Book This Activity</a>
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

<section class="section bg-default text-center offset-top-50">
        <div class="parallax-container" data-parallax-img="images/parallax-1-1920x850.jpg">
          <div class="parallax-content section-xl section-inset-custom-1 context-dark bg-overlay-2-21">
            <div class="container">
              <h2 class="heading-2 oh font-weight-normal wow slideInDown"><span class="d-block font-weight-semi-bold">West Bali National park</h2>
              <br>
              <h6><i>Also feature interesting spots to explore.</i></h6>
              <p class="text-width-medium text-spacing-75 wow fadeInLeft" data-wow-delay=".1s" style="text-align: justify;">
              In addition to diving or snorkeling, other attractions you can explore include the forests of West Bali National Park. The park covers an area of about 19,000 hectares, including Prapat Agung, Tegal Bunder, Cekik, Menjangan Island, Klatakan, Banyuwedang, and Teluk Trima. It comprises four types of forests: Mangrove Forest, Savanna Forest, Monsoon Forest, and Tropical Rainforest, making West Bali National Park a home to hundreds of species of flora and fauna.
              </p>
              </p><a class="button button-secondary button-pipaluk" href="{{ url('/Land-Adventure') }}">More Activity</a>
            </div>
          </div>
        </div>
      </section>
<!-- Land Adventure -->
@if($landAdventure->isNotEmpty())
<section class="section section-sm bg-default">
    <div class="container">
        <h3 class="oh-desktop"><span class="d-inline-block wow slideInDown">Land Adventure</span></h3>
        <p>Here are the tourist attractions in West Bali National Park: trekking, mangrove tours, safari tours, birdwatching, camping, cycling, etc.</p>
        <div class="row row-sm row-40 row-md-50">
            @foreach($landAdventure as $kegiatan)
            <div class="col-6 col-md-4 col-lg-3 wow fadeInRight">
                <!-- Product Big -->
                <article class="product-big" style="display: flex; flex-direction: column; height: 130%;">
                    <div class="unit flex-column align-items-stretch" style="flex-grow: 1;">
                        <!-- Gambar berada di atas -->
                        <div class="unit-left" style="overflow: hidden;">
                            <a class="product-big-figure" href="#" data-toggle="modal" data-target="#modalLand{{ $kegiatan->id }}">
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
                                  <a class="button button-black-outline button-ujarak" href="{{ route('land.show', $kegiatan->id) }}" style="font-size: 0.8rem;">Book This Activity</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <br />
            </div>

            <!-- Modal untuk gambar -->
            <div class="modal fade" id="modalLand{{ $kegiatan->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabelLand{{ $kegiatan->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabelLand{{ $kegiatan->id }}">{{ $kegiatan->nama }}</h5>
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

<section class="section bg-default text-center offset-top-50">
        <div class="parallax-container" data-parallax-img="images/parallax-1-1920x850.jpg">
          <div class="parallax-content section-xl section-inset-custom-1 context-dark bg-overlay-2-21">
            <div class="container">
              <h2 class="heading-2 oh font-weight-normal wow slideInDown"><span class="d-block font-weight-semi-bold">Transport & Tour</h2>
              <br>
              <h6><i>The best choice of tour & transportation packages</i></h6>
              </p><a class="button button-secondary button-pipaluk" href="{{ url('/Transport-Tour') }}">More Activity</a>
            </div>
          </div>
        </div>
      </section>
<!-- Transport & Tour -->
@if($transportTour->isNotEmpty())
<section class="section section-sm bg-default">
    <div class="container">
        <h3 class="oh-desktop"><span class="d-inline-block wow slideInDown">Transport & Tour</span></h3>
        <p>The best choice of tour & transportation packages.</p>
        <div class="row row-sm row-40 row-md-50">
            @foreach($transportTour as $kegiatan)
            <div class="col-6 col-md-4 col-lg-3 wow fadeInRight">
                <!-- Product Big -->
                <article class="product-big" style="display: flex; flex-direction: column; height: 130%;">
                    <div class="unit flex-column align-items-stretch" style="flex-grow: 1;">
                        <!-- Gambar berada di atas -->
                        <div class="unit-left" style="overflow: hidden;">
                            <a class="product-big-figure" href="#" data-toggle="modal" data-target="#modalTransport{{ $kegiatan->id }}">
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
                                  <a class="button button-black-outline button-ujarak" href="{{ route('transport.show', $kegiatan->id) }}" style="font-size: 0.8rem;">Book This Activity</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <br />
            </div>

            <!-- Modal untuk gambar -->
            <div class="modal fade" id="modalTransport{{ $kegiatan->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabelTransport{{ $kegiatan->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabelTransport{{ $kegiatan->id }}">{{ $kegiatan->nama }}</h5>
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
      
      <!-- Section Subscribe-->
      <section class="section bg-default text-center offset-top-50">
      <div class="parallax-container" data-parallax-img="images/parallax-1-1920x850.jpg">
        <div class="parallax-content section-xl section-inset-custom-1 context-dark bg-overlay-2-21">
          <div class="container">
            <h2 class="heading-2 oh font-weight-normal wow slideInDown">
              <span class="d-block font-weight-semi-bold">Go, booking now!</span>
            </h2>
            <p class="text-width-medium text-spacing-75 wow fadeInLeft" data-wow-delay=".1s" style="text-align: justify;">
              Dive into Marine Adventures, Conquer Uncharted Lands, Travel seamlessly with Transport & Tour, and Unwind in Exceptional Places to Stay. Let’s create unforgettable memories together – your adventure begins with us!
            </p>
          </div>
        </div>
      </div>
    </section>

      <!--	Instagrram wondertour-->
      <section class="section section-sm section-top-0 section-fluid section-relative bg-gray-4">
        <div class="container-fluid">
          <h6 class="gallery-title">Gallery</h6>
          <!-- Owl Carousel-->
          <div class="owl-carousel owl-classic owl-dots-secondary" data-items="1" data-sm-items="2" data-md-items="3" data-lg-items="4" data-xl-items="5" data-xxl-items="6" data-stage-padding="15" data-xxl-stage-padding="0" data-margin="30" data-autoplay="true" data-nav="true" data-dots="true">
            <!-- Thumbnail Classic-->
            <article class="thumbnail thumbnail-mary">
              <div class="thumbnail-mary-figure"><img src="assets/images/galeri1.jpg" alt="" width="270" height="195"/>
              </div>
              <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="assets/images/gallery-image-1-1200x800-original.jpg" data-lightgallery="item"><img src="assets/images/gallery-image-1-270x195.jpg" alt="" width="270" height="195"/></a>
              </div>
            </article>
            <!-- Thumbnail Classic-->
            <article class="thumbnail thumbnail-mary">
              <div class="thumbnail-mary-figure"><img src="assets/images/galeri2.jpg" alt="" width="270" height="195"/>
              </div>
              <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="assets/images/gallery-image-2-1200x800-original.jpg" data-lightgallery="item"><img src="assets/images/gallery-image-2-270x195.jpg" alt="" width="270" height="195"/></a>
              </div>
            </article>
            <!-- Thumbnail Classic-->
            <article class="thumbnail thumbnail-mary">
              <div class="thumbnail-mary-figure"><img src="assets/images/galeri1.jpg" alt="" width="270" height="195"/>
              </div>
              <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="assets/images/gallery-image-3-1200x800-original.jpg" data-lightgallery="item"><img src="assets/images/gallery-image-3-270x195.jpg" alt="" width="270" height="195"/></a>
              </div>
            </article>
            <!-- Thumbnail Classic-->
            <article class="thumbnail thumbnail-mary">
              <div class="thumbnail-mary-figure"><img src="assets/images/galeri2.jpg" alt="" width="270" height="195"/>
              </div>
              <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="assets/images/gallery-image-4-1200x800-original.jpg" data-lightgallery="item"><img src="assets/images/gallery-image-4-270x195.jpg" alt="" width="270" height="195"/></a>
              </div>
            </article>
           <!-- Thumbnail Classic-->
           <article class="thumbnail thumbnail-mary">
              <div class="thumbnail-mary-figure"><img src="assets/images/galeri1.jpg" alt="" width="270" height="195"/>
              </div>
              <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="assets/images/gallery-image-4-1200x800-original.jpg" data-lightgallery="item"><img src="assets/images/gallery-image-4-270x195.jpg" alt="" width="270" height="195"/></a>
              </div>
            </article>
            <!-- Thumbnail Classic-->
            <article class="thumbnail thumbnail-mary">
              <div class="thumbnail-mary-figure"><img src="assets/images/galeri2.jpg" alt="" width="270" height="195"/>
              </div>
              <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="assets/images/gallery-image-6-1200x800-original.jpg" data-lightgallery="item"><img src="assets/images/gallery-image-6-270x195.jpg" alt="" width="270" height="195"/></a>
              </div>
            </article>
            <!-- Thumbnail Classic-->
            <article class="thumbnail thumbnail-mary">
              <div class="thumbnail-mary-figure"><img src="assets/images/galeri1.jpg" alt="" width="270" height="195"/>
              </div>
              <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="assets/images/gallery-image-7-1200x800-original.jpg" data-lightgallery="item"><img src="assets/images/gallery-image-7-270x195.jpg" alt="" width="270" height="195"/></a>
              </div>
            </article>
          </div>
        </div>
      </section>
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