<?php
$this->extend('_layout.php');
$this->section('content');
?>
    <h1 class="d-none"><?= lang('Theme.navigations.packages') ?></h1>
    <section id="packages" class="contact section mt-5 pt-5">
        <!-- Section Title -->
        <div class="container section-title mt-5 pb-3" data-aos="fade-up">
            <h2><span class="d-none"><?= lang('Theme.navigations.packages') ?></span> <i class="fa-solid fa-chevron-right"></i><i class="fa-solid fa-chevron-right"></i></h2>
            <p><?= lang('Theme.navigations.packages') ?></p>
        </div><!-- End Section Title -->
    </section>
    <section class="packages section pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <img src="<?= base_url('img/package-adult.jpg') ?>" class="img-fluid" alt="Wisdom Golf Academy <?= lang('Packages.adult') ?>" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <img src="<?= base_url('img/package-junior.jpg') ?>" class="img-fluid" alt="Wisdom Golf Academy <?= lang('Packages.junior') ?>" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
$this->endSection();
?>