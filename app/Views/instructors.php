<?php
$this->extend('_layout.php');
$this->section('content');
?>
    <h1 class="d-none"><?= lang('Theme.navigations.instructors') ?></h1>
    <!-- Team Section -->
    <section id="team" class="team section light-background mt-5 pt-5">
        <!-- Section Title -->
        <div class="container section-title mt-5" data-aos="fade-up">
            <h2><span class="d-none"><?= lang('Instructors.title') ?></span> <i class="fa-solid fa-chevron-right"></i><i class="fa-solid fa-chevron-right"></i></h2>
            <p><?= lang('Instructors.title') ?></p>
        </div><!-- End Section Title -->
        <div class="container">
            <div class="row gy-5">
                <?php $instructors = lang('Instructors.instructors') ?>
                <?php foreach ($instructors as $i => $instructor) : ?>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="<?= ($i+1) * 100 ?>">
                    <img src="<?= base_url('img/instructor-' . $i . '.jpg') ?>" class="img-fluid" alt="<?= $instructor['nickname'] ?>">
                    <div class="card mx-3 mx-md-5 mx-lg-3 mx-xl-5" style="top:-75px;z-index:1;">
                        <div class="card-body">
                            <p class="text-end">
                                <?php
                                if (isset($instructor['social-media']['instagram'])) {
                                    echo '<a class="mx-2" href="' . $instructor['social-media']['instagram'] . '" target="_blank"><i class="fa-brands fa-instagram"></i><span class="d-none">Instagram</span></a>';
                                }
                                if (isset($instructor['social-media']['tiktok'])) {
                                    echo '<a class="mx-2" href="' . $instructor['social-media']['tiktok'] . '" target="_blank"><i class="fa-brands fa-tiktok"></i><span class="d-none">TikTok</span></a>';
                                }
                                ?>
                            </p>
                            <h3><?= $instructor['nickname'] ?><br><?= $instructor['name'] ?></h3>
                            <p class="fst-italic"><?= $instructor['title'] ?></p>
                            <p><?= $instructor['certified'] ?></p>
                            <p><?= lang('Instructors.headers.languages') ?>:
                                <?php foreach ($instructor['languages'] as $lang) : ?>
                                    <img src="<?= base_url('img/flag-' . $lang . '.svg') ?>" alt="<?= lang('Theme.languages.' . $lang) ?>" class="language-flag">
                                <?php endforeach; ?>
                            </p>
                            <?php if (!empty($instructor['certificates'])) : ?>
                                <h4><?= lang('Instructors.headers.certificates') ?>:</h4>
                                <ul>
                                    <?php foreach ($instructor['certificates'] as $certificate) : ?>
                                        <li><?= $certificate ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            <?php if (!empty($instructor['experiences'])) : ?>
                                <h4><?= lang('Instructors.headers.experiences') ?>:</h4>
                                <ul>
                                    <?php foreach ($instructor['experiences'] as $experience) : ?>
                                        <li><?= $experience ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            <?php if (!empty($instructor['tournaments'])) : ?>
                                <h4><?= lang('Instructors.headers.tournaments') ?>:</h4>
                                <ul>
                                    <?php foreach ($instructor['tournaments'] as $tournament) : ?>
                                        <li><?= $tournament ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            <?php if (!empty($instructor['education'])) : ?>
                                <h4><?= lang('Instructors.headers.education') ?>:</h4>
                                <ul>
                                    <?php foreach ($instructor['education'] as $education) : ?>
                                        <li><?= $education ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div><!-- End Team Member -->
                <?php endforeach; ?>
            </div>
        </div>
    </section><!-- /Team Section -->
<?php
$this->endSection();
?>