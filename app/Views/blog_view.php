<?php
$this->extend('_layout.php');
$this->section('content');
?>
    <h1 class="d-none"><?= lang('Theme.navigations.blog') ?> - <?= lang('Seo.all-pages.keywords') ?></h1>
    <section id="blog" class="blog section pt-0">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col">
                    <p class="mb-0 mt-2">
                        <i class="fa-solid fa-chevron-right"></i>
                        <a href="<?= base_url($locale . '/blog') ?>"><?= lang('Theme.navigations.blog') ?></a>
                        <i class="fa-solid fa-chevron-right"></i>
                        <span id="this-blog-title"><?= $title ?></span>
                    </p>
                </div>
            </div>
        </div>
        <!-- Section Title -->
        <div class="container section-title mt-5" data-aos="fade-up">
            <h2><span class="d-none"><?= lang('Blog.title') ?></span> <i class="fa-solid fa-chevron-right"></i><i class="fa-solid fa-chevron-right"></i></h2>
            <p id="blog-title"><?= $title ?></p>
        </div><!-- End Section Title -->
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-md-10 col-lg-8">
                    <div>
                        <i class="fa-solid fa-calendar-days"></i> <?= $date ?>
                        <i class="fa-solid fa-user ms-3"></i> <?= $user_name ?>
                        <?php if (!empty($tags)) : ?>
                            <i class="fa-solid fa-tags ms-3"></i>
                            <?php foreach ($tags as $id => $name) : ?>
                                <a href="<?= base_url($locale . '/blog/tag/' . $id) ?>" class="badge bg-warning"><?= $name ?></a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <article class="my-5 blog-article">
                        <?= $post['content']['rendered'] ?>
                    </article>
                </div>
            </div>
        </div>
    </section>
<?php
$this->endSection();
?>