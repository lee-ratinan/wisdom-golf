<?php
$this->extend('_layout.php');
$this->section('content');
?>
    <h1 class="d-none"><?= lang('Theme.navigations.home') ?></h1>
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
        <div class="container d-flex flex-column align-items-center">
            <h2 data-aos="fade-up" data-aos-delay="100"><?= lang('Home.hero.title') ?></h2>
            <p data-aos="fade-up" data-aos-delay="200"><?= lang('Home.hero.subtitle') ?></p>
            <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
                <a href="#contact" class="btn-get-started">Get Started</a>
                <a href="https://www.youtube.com/watch?v=20hPt7jbbhg" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
            </div>
        </div>
    </section><!-- /Hero Section -->
    <!-- About Section -->
    <section id="about" class="about section">
        <div class="container">
            <div class="row gy-4">
                <div class="col-12" data-aos="fade-up" data-aos-delay="100">
                    <h2><?= lang('Home.intro.title') ?></h2>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <img src="<?= base_url('img/home-intro.jpg') ?>" class="img-fluid rounded-4 mb-4" alt="<?= lang('Home.hero.title') ?>">
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="content ps-0 ps-lg-5">
                        <p><?= lang('Home.intro.para1') ?></p>
                        <p><?= lang('Home.intro.para2') ?></p>
                        <div class="position-relative mt-4">
                            <img src="assets/img/about-2.jpg" class="img-fluid rounded-4" alt="">
                            <a href="https://www.youtube.com/watch?v=20hPt7jbbhg" class="glightbox pulsating-play-btn"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /About Section -->
    <!-- Why Us Section -->
    <section id="why-us" class="testimonials section">
        <div class="container" data-aos="fade-up" data-aos-delay="200">
            <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
                    {"loop": true, "speed": 600, "autoplay": {"delay": 5000}, "slidesPerView": "auto",
"pagination": {"el": ".swiper-pagination-why-us", "type": "bullets", "clickable": true}}
                </script>
                <div class="row">
                    <div class="col text-center my-3">
                        <h2><?= lang('Home.why-academy.title') ?></h2>
                    </div>
                </div>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                            <h3>Saul Goodman</h3>
                            <h4>Ceo &amp; Founder</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->
                </div>
                <div class="swiper-pagination-why-us"></div>
            </div>
        </div>
    </section><!-- /Why Us Section -->
    <!-- Why Trackman Section -->
    <section id="why-trackman" class="testimonials section">
        <div class="container" data-aos="fade-up" data-aos-delay="200">
            <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
                    {"loop": true, "speed": 600, "autoplay": {"delay": 5000}, "slidesPerView": "auto",
                        "pagination": {"el": ".swiper-pagination-why-trackman", "type": "bullets", "clickable": true}}
                </script>
                <div class="row">
                    <div class="col text-center my-3">
                        <h2><?= lang('Home.why-trackman.title') ?></h2>
                    </div>
                </div>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                            <h3>Saul Goodman</h3>
                            <h4>Ceo &amp; Founder</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->
                </div>
                <div class="swiper-pagination-trackman"></div>
            </div>
        </div>
    </section><!-- /Why Trackman Section -->
<?php
$this->endSection();
?>