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
                <div class="col">
                    <?php foreach ($posts as $post) : ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="card-title"><a href="<?= $post['url'] ?>"><?= $post['title'] ?></a></h2>
                            <?php if (0 < $post['media_id'] && isset($media[$post['media_id']])) : ?>
                            <div class="float-end ms-3">
                                <a href="<?= $post['url'] ?>"><img src="<?= $media[$post['media_id']] ?>" alt="<?= $post['title'] ?>" class="img-fluid img-thumbnail" /></a>
                            </div>
                            <?php endif; ?>
                            <div><i class="fa-solid fa-calendar-days"></i> <?= $post['date'] ?></div>
                            <div class="blog-excerpt my-2"><?= $post['excerpt'] ?></div>
                            <div class="my-2"><a href="<?= $post['url'] ?>"><?= lang('Blog.read-more') ?></a></div>
                            <?php if (!empty($post['tag_ids'])) : ?>
                                <div><i class="fa-solid fa-tags"></i> <?php foreach ($post['tag_ids'] as $tag_id) : ?> <a href="<?= base_url($locale . '/blog/tag/' . $tags[$tag_id] . '/' . $tag_id) ?>" class="badge bg-warning"><?= $tags[$tag_id] ?></a> <?php endforeach; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php
$this->endSection();
?>