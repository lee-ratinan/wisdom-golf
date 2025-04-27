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
            <form action="<?= base_url($locale . '/blog/search') ?>" method="get">
                <div class="row gy-4">
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="input-group float-end">
                            <label for="search" class="d-none"><?= lang('Blog.search') ?></label>
                            <input type="text" id="search" class="form-control" name="q" placeholder="<?= lang('Blog.search') ?>" value="<?= $q ?>" required/>
                            <button class="btn btn-primary" type="submit"><?= lang('Blog.search') ?></button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row gy-4">
                <div class="col">
                    <?php if (empty($posts)) : ?>
                        <div class="alert alert-warning" role="alert">
                            <?= lang('Blog.no-result') ?>
                        </div>
                    <?php else : ?>
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
                                    <div><i class="fa-solid fa-tags"></i> <?php foreach ($post['tag_ids'] as $tag_id) : ?> <a href="<?= base_url($locale . '/blog/tag/' . $tag_id) ?>" class="badge bg-warning"><?= $tags[$tag_id] ?></a> <?php endforeach; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <?php if (1 == $pg) : ?>
                        <?= lang('blog.previous') ?>
                    <?php else : ?>
                        <a href="?page=<?= $pg - 1 ?>&q=<?= $q ?>&tag=<?= $tag ?>"><?= lang('blog.previous') ?></a>
                    <?php endif; ?>
                    | <?= lang('Blog.page', [$pg]) ?> |
                    <a href="?page=<?= $pg + 1 ?>&q=<?= $q ?>&tag=<?= $tag ?>"><?= lang('blog.next') ?></a>
                </div>
            </div>
        </div>
    </section>
<?php
$this->endSection();
?>