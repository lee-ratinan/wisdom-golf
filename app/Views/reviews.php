<?php
$this->extend('_layout.php');
$this->section('content');
?>
    <h1 class="d-none"><?= lang('Theme.navigations.reviews') ?></h1>
    <section id="contact" class="contact section pt-0 pb-2">
        <!-- Section Title -->
        <div class="container section-title mt-5 pb-3" data-aos="fade-up">
            <h2><span class="d-none"><?= lang('Reviews.title') ?></span> <i class="fa-solid fa-chevron-right"></i><i class="fa-solid fa-chevron-right"></i></h2>
            <p><?= lang('Reviews.title') ?></p>
        </div><!-- End Section Title -->
    </section>
    <div class="container-fluid text-center" data-aos="fade-up" data-aos-delay="100">
        <img src="<?= base_url('img/reviews-background.png') ?>" class="img-fluid w-100" alt="<?= lang('Theme.navigations.reviews') ?>">
    </div>
    <section class="section light-background mt-4">
        <div class="container">
            <div class="row">
                <?php $reviews = lang('Reviews.reviews') ?>
                <?php foreach ($reviews as $i => $review) : ?>
                    <div class="col-12 <?= (0 == $i % 2 ? '':'text-md-end') ?>"  data-aos="fade-up" data-aos-delay="<?= ($i+1)*150 ?>">
                        <h2 class="mt-3"><?= $review['name'] ?></h2>
                        <div class="text-warning">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="my-3"><?= $review['message'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php
$this->endSection();
?>
