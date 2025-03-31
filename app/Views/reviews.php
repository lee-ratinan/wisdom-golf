<?php
$this->extend('_layout.php');
$this->section('content');
?>
    <h1 class="d-none"><?= lang('Theme.navigations.reviews') ?></h1>
    <section id="contact" class="contact section mt-5 pt-5">
        <!-- Section Title -->
        <div class="container section-title mt-5 pb-3" data-aos="fade-up">
            <h2><span class="d-none"><?= lang('Reviews.title') ?></span> <i class="fa-solid fa-chevron-right"></i><i class="fa-solid fa-chevron-right"></i></h2>
            <p><?= lang('Reviews.title') ?></p>
        </div><!-- End Section Title -->
    </section>
    <section id="testimonials" class="testimonials section light-background">
        <img src="<?= base_url('img/reviews-bg.jpg') ?>" class="testimonials-bg" alt="<?= lang('Theme.navigations.reviews') ?>">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
                    {"loop": true, "speed": 600, "autoplay": {"delay": 5000}, "slidesPerView": "auto", "pagination": {"el": ".swiper-pagination", "type": "bullets", "clickable": true}}
                </script>
                <div class="swiper-wrapper">
                    <?php $reviews = lang('Reviews.reviews') ?>
                    <?php foreach ($reviews as $review) : ?>
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <i class="fa-solid fa-circle-user fa-3x"></i>
                            <h2 class="mt-3"><?= $review['name'] ?></h2>
                            <div class="stars">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p><?= $review['message'] ?></p>
                        </div>
                    </div><!-- End testimonial item -->
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
<?php
$this->endSection();
?>