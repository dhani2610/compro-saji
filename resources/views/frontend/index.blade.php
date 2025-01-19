@extends('frontend.layouts.app')

@section('content')

    <style>
    

        /*--------------------------------------------------------------
                    # Clients Section
                    --------------------------------------------------------------*/
        .clients .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .clients .client-logo {
            flex: 0 0 calc(20% - 10px);
            /* 20% untuk 5 logo per baris */
            margin: 5px;
            box-sizing: border-box;
        }

        @media (max-width: 768px) {
            .clients .client-logo {
                flex: 0 0 calc(33.33% - 10px);
                /* 3 logo per baris di tablet */
            }
        }

        @media (max-width: 576px) {
            .clients .client-logo {
                flex: 0 0 calc(50% - 10px);
                /* 2 logo per baris di ponsel */
            }
        }

        .gallery-item img {
            width: 100%;
            /* Pastikan gambar memenuhi lebar kontainer */
            height: 200px;
            /* Tetapkan tinggi tetap */
            object-fit: cover;
            /* Memotong gambar jika terlalu besar */
            border-radius: 8px;
            /* Opsional: Membuat sudut lebih halus */
        }

        .gallery-item {
            padding: 10px;
            /* Tambahkan jarak antar elemen */
            display: flex;
            justify-content: center;
            align-items: center;
        }


        /*--------------------------------------------------------------
        # Services Section
        --------------------------------------------------------------*/
      

        .why-us .service-card:hover .icon {
            background: var(--accent-color);
            color: var(--contrast-color);
        }

        .why-us .service-card .icon {
            width: 60px;
            height: 60px;
            background: color-mix(in srgb, var(--accent-color), transparent 90%);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            color: var(--accent-color);
            font-size: 28px;
            transition: all 0.3s ease;
            line-height: 1;
        }

        .swiper-horizontal>.swiper-pagination-bullets, .swiper-pagination-bullets.swiper-pagination-horizontal, .swiper-pagination-custom, .swiper-pagination-fraction {
                margin-top: 65px;
                bottom: var(--swiper-pagination-bottom, -5px);
                top: var(--swiper-pagination-top, auto);
                left: 0;
                width: 100%;
            }

      
    </style>

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

        <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            @foreach ($slider as $s)
                <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                    <img src="{{ asset('assets/img/slider/' . $s->image) }}" alt="">
                    <div class="carousel-container">
                        <h2>{{ $s->title }} </h2>
                        <p>{{ $s->description }}</p>
                        <div>
                            <a href="#about" class="btn-get-started">About Me</a>
                        </div>
                    </div>
                </div><!-- End Carousel Item -->
            @endforeach


            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

            <ol class="carousel-indicators"></ol>

        </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section light-background">

        <div class="container section-title" data-aos="fade-up">
            <h2>Profil</h2>
            <div><span class="description-title">About Saji</span></div>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">
                <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
                    <center>
                        
                        <img src="{{ isset($profile->background_image) ? asset('assets/img/profile/' . $profile->background_image) : '' }}"
                            class="img-fluid" alt="">
                    </center>
                </div>
                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
                    {!! $profile->tentang_kami !!}
                </div>
            </div>

        </div>

    </section><!-- /About Section -->

    <!-- Why Us Section -->
    <section id="why-us" class="why-us section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Why Us</h2>
            <div><span class="description-title">Our Services</span></div>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">
                <div class="swiper init-swiper" data-aos="fade-up" data-aos-delay="100">
                    <script type="application/json" class="swiper-config">
                    {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                        "delay": 5000
                    },
                    "slidesPerView": 2,
                    "spaceBetween": 40,
                    "pagination": {
                        "el": ".swiper-pagination",
                        "type": "bullets",
                        "clickable": true
                    }
                    }
                </script>
                    <div class="swiper-wrapper">
                        @foreach ($our_services as $us)
                            <div class="swiper-slide">
                                <div class="row gy-4 event-item">
                                    <div class="card-item service-card">
                                        <center>
                                            <div class="icon flex-shrink-0">
                                                <i class="bi bi-diagram-3"></i>
                                            </div>
                                            <h4><a href="" class="">{{ $us->judul }}</a></h4>
                                        </center>
                                    </div>
                                </div>
                            </div><!-- End Slider item -->
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

        </div>

    </section><!-- /Why Us Section -->

    <section id="branding" class="clients section light-background">
        <div class="container section-title" data-aos="fade-up">
            <h2>Branding</h2>
            <div><span class="description-title">ISO Verified</span></div>
        </div><!-- End Section Title -->
        <div class="container aos-init aos-animate" data-aos="fade-up">

            <div class="row gy-4">
                @foreach ($branding as $bd)
                    <div class="col-xl-2 col-md-2 col-6 client-logo">
                        <img src="{{ asset('assets/img/branding/' . $bd->image) }}" class="img-fluid" alt="">
                        <br>
                    </div><!-- End Client Item -->
                @endforeach
            </div>


        </div>

    </section>

    <!-- Events Section -->
    <section id="projects" class="events section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Portfolio</h2>
            <div><span class="description-title">Project</span></div>
        </div><!-- End Section Title -->


        <div class="container">

            <div class="swiper init-swiper" data-aos="fade-up" data-aos-delay="100">
                <script type="application/json" class="swiper-config">
              {
                "loop": true,
                "speed": 600,
                "autoplay": {
                  "delay": 5000
                },
                "slidesPerView": "auto",
                "pagination": {
                  "el": ".swiper-pagination",
                  "type": "bullets",
                  "clickable": true
                }
              }
            </script>
                <div class="swiper-wrapper">
                    @foreach ($project as $pj)
                        <div class="swiper-slide">
                            <div class="row gy-4 event-item">
                                <div class="col-lg-12 pt-4 pt-lg-0 content">
                                    <center>
                                        <div class="price">
                                            <p><span>{{ $pj->judul }}</span></p>
                                        </div>
                                        <img src="{{ asset('assets/img/project/' . $pj->gambar) }}" class="img-fluid"
                                            style="border-radius: 20px" alt="">
                                    </center>
                                </div>
                            </div>
                        </div><!-- End Slider item -->
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>

    </section><!-- /Events Section -->

    <!-- Gallery Section -->
    <section id="gallery" class="gallery section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Gallery</h2>
            <div><span>Some photos from</span> <span class="description-title">Our Saji</span></div>
        </div><!-- End Section Title -->

        <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-0">
                @foreach ($gallery as $g)
                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item" style="background: silver">
                            <a href="{{ asset('assets/img/gallery/' . $g->image) }}" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="{{ asset('assets/img/gallery/' . $g->image) }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->
                @endforeach
            </div>
        </div>

    </section><!-- /Gallery Section -->


    {{-- <!-- Contact Section -->
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <div><span>Check Our</span> <span class="description-title">Contact</span></div>
        </div><!-- End Section Title -->

        <div class="mb-5">
            <iframe style="width: 100%; height: 400px;"
                src="{{ $footer->link_embed_maps }}"
                frameborder="0" allowfullscreen=""></iframe>
        </div><!-- End Google Maps -->

    </section><!-- /Contact Section --> --}}
@endsection
