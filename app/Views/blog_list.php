<?php
$this->extend('_layout.php');
$this->section('content');
?>
    <h1 class="d-none"><?= lang('Theme.navigations.blog') ?> - <?= lang('Seo.all-pages.keywords') ?></h1>
    <!-- Contact Section -->
    <section id="blog" class="blog section pt-0">
        <!-- Section Title -->
        <div class="container section-title mt-5" data-aos="fade-up">
            <h2><span class="d-none"><?= lang('Blog.title') ?></span> <i class="fa-solid fa-chevron-right"></i><i class="fa-solid fa-chevron-right"></i></h2>
            <p><?= lang('Blog.title') ?></p>
        </div><!-- End Section Title -->
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-md-10 col-lg-8" id="blog-list">
                    <i class="fa-solid fa-spinner fa-spin"></i> <?= lang('Blog.loading') ?>
                </div>
            </div>
        </div>
    </section>
    <script>let mode = '<?= $mode ?>', category_id = '<?= $config['category_id'] ?>', blog_url = '<?= $config['blog_url'] ?>', base_url = '<?= base_url('blog/view') ?>/', read_more = '<?= lang('Blog.read_more') ?>';</script>
<?php
$this->endSection();
?>