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
                    <div class="d-none d-md-block col-md-6 col-lg-8">&nbsp;</div>
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
                <div class="col-md-10 col-lg-8">
                    <p>
                        <?= lang('Blog.showing', [$pg, $total_pages]) ?>
                        <?php if (!empty($q)) : ?>
                            <?= lang('Blog.search-result', [$q]) ?>
                        <?php endif; ?>
                        <?php if (!empty($tag)) : ?>
                            <?= lang('Blog.tag-filter', [$tag]) ?>
                        <?php endif; ?>
                        <?= lang('Blog.total-posts', [$total_posts]) ?>
                        <?php if (!empty($q) || !empty($tag)) : ?>
                            | <a href="<?= base_url($locale . '/blog') ?>"><?= lang('Blog.clear-filter') ?></a>
                        <?php endif; ?>
                    </p>
                    <?php if (empty($posts)) : ?>
                        <div class="alert alert-warning" role="alert">
                            <?= lang('Blog.no-result') ?>
                        </div>
                    <?php else : ?>
                        <?php foreach ($posts as $post) : ?>
                        <div class="mb-3">
                            <h2 class="mb-3"><a href="<?= $post['url'] ?>"><?= $post['title'] ?></a></h2>
                            <p>
                                <i class="fa-solid fa-calendar-days"></i> <?= $post['date'] ?>
                                <i class="fa-solid fa-user ms-3"></i> <?= $authors[$post['author']] ?>
                                <?php if (!empty($post['tag_ids'])) : ?>
                                    <i class="fa-solid fa-tags ms-3"></i>
                                    <?php foreach ($post['tag_ids'] as $tag_id) : ?>
                                        <a href="<?= base_url($locale . '/blog/tag/' . $tag_id) ?>" class="badge bg-warning"><?= $tags[$tag_id] ?></a>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </p>
                            <?php if (0 < $post['media_id'] && isset($media[$post['media_id']])) : ?>
                                <div class="float-end ms-3">
                                    <a href="<?= $post['url'] ?>"><img src="<?= $media[$post['media_id']] ?>" alt="<?= $post['title'] ?>" class="img-fluid img-thumbnail" /></a>
                                </div>
                            <?php endif; ?>
                            <div class="blog-excerpt my-2"><?= $post['excerpt'] ?></div>
                            <div class="my-2"><a href="<?= $post['url'] ?>"><?= lang('Blog.read-more') ?></a></div>
                            <hr class="my-5" style="clear: both" />
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <!-- PREV -->
                    <?php if (1 == $pg) : ?>
                        <?= lang('Blog.previous') ?>
                    <?php else : ?>
                        <a href="?page=<?= $pg - 1 ?>&q=<?= $q ?>&tag=<?= $tag ?>"><?= lang('Blog.previous') ?></a>
                    <?php endif; ?>
                    <!-- CURRENT PAGE -->
                    | <?= lang('Blog.page', [$pg]) ?> |
                    <!-- NEXT -->
                    <?php if ($total_pages >= $pg + 1) : ?>
                        <a href="?page=<?= $pg + 1 ?>&q=<?= $q ?>&tag=<?= $tag ?>"><?= lang('Blog.next') ?></a>
                    <?php else: ?>
                        <?= lang('Blog.next') ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php
$this->endSection();
?>