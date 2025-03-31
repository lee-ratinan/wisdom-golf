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
                <a href="#contact" class="btn-get-started"><?= lang('Home.cta.get-started') ?></a>
                <a href="https://www.youtube.com/watch?v=20hPt7jbbhg" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span><?= lang('Home.cta.watch-video') ?></span></a>
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
                            <img src="<?= base_url('img/video-thumbnail.jpg') ?>" class="img-fluid rounded-4" alt="<?= lang('Home.hero.title') ?>">
                            <a href="https://www.youtube.com/watch?v=20hPt7jbbhg" class="glightbox pulsating-play-btn"><span class="d-none"><?= lang('Home.cta.watch-video') ?></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /About Section -->
    <!-- Why Us Section -->
    <section id="carousel" class="testimonials section dark-background">
        <div class="container" data-aos="fade-up" data-aos-delay="200">
            <div class="row">
                <div class="col-12">
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
                            <?php $why = lang('Home.why-academy.items') ?>
                            <?php foreach ($why as $i => $value) : ?>
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <img src="<?= base_url('img/why-academy-' . $i . '.jpg') ?>" class="img-fluid" alt="<?= lang('Home.why-academy.title') ?> <?= $i ?>">
                                        <p class="mt-4"><?= $value ?></p>
                                    </div>
                                </div><!-- End testimonial item -->
                            <?php endforeach; ?>
                        </div>
                        <div class="swiper-pagination-why-us"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="carousel" class="testimonials section">
        <div class="container" data-aos="fade-up" data-aos-delay="300">
            <div class="row">
                <div class="col-12">
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
                            <?php $why = lang('Home.why-trackman.items') ?>
                            <?php foreach ($why as $i => $value) : ?>
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <img src="<?= base_url('img/why-trackman-' . $i . '.jpg') ?>" class="img-fluid" alt="<?= lang('Home.why-trackman.title') ?> <?= $i ?>">
                                        <p class="mt-4"><?= $value ?></p>
                                    </div>
                                </div><!-- End testimonial item -->
                            <?php endforeach; ?>
                        </div>
                        <div class="swiper-pagination-why-trackman"></div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Why Us Section -->
<?php
$this->endSection();
?>