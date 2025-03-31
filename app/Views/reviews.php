<?php
$this->extend('_layout.php');
$this->section('content');
?>
    <section id="testimonials" class="testimonials section light-background mt-5">
        <img src="<?= base_url('img/reviews-bg.jpg') ?>" class="testimonials-bg" alt="<?= lang('Theme.navigations.reviews') ?>">
        <h1 class="my-5 py-5"><?= lang('Theme.navigations.reviews') ?></h1>
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