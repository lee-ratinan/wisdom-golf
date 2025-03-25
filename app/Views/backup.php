<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="<?= lang('Page.company.title') ?>">
    <title><?= lang('Page.company.title') ?></title>
    <link rel="canonical" href="<?= base_url($locale) ?>">
    <!-- favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/favicon.png') ?>">
    <link href="<?= base_url('assets/bootstrap-5.3.3/css/bootstrap.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/aos/aos.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/fontawesome-free-6.7.2/css/all.min.css') ?>" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Noto+Sans+Thai:wght@100..900&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: linear-gradient(to bottom right, #f97f1b, #924a14, #582c0d, #000000);
            color: #fff;
        }
        .btn-social {
            display: inline-flex;
            height:45px;
            width:45px;
            line-height:45px;
            text-align:center;
            justify-content: center;
            align-items: center;
            margin-right: 1rem;
        }
        h1, h2, h3, h4 {
            font-family: '<?= ('th' == $locale ? 'Noto Sans Thai' : ('en' == $locale ? 'Oswald' : 'Noto Sans JP')) ?>', sans-serif;
            margin-bottom: 1rem;
        }
        .card {
            background-color: var(--bs-yellow);
        }
        h1, h2 {
            color: var(--bs-yellow);
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row pt-5 mb-5">
        <div class="col-12 text-end">
            <a href="#reviews" class="btn btn-sm btn-outline-warning"><?= lang('Page.review') ?></a>
            <a href="#instructors" class="btn btn-sm btn-outline-warning"><?= lang('Page.instructor.title') ?></a>
            <a href="#contact" class="btn btn-sm btn-outline-warning"><?= lang('Page.contact.title') ?></a>
            <?php if ('en' != $locale) : ?>
                <a class="btn btn-sm btn-outline-light" href="<?= base_url('en') ?>">EN</a>
            <?php endif; ?>
            <?php if ('th' != $locale) : ?>
                <a class="btn btn-sm btn-outline-light" href="<?= base_url('th') ?>">ท</a>
            <?php endif; ?>
            <?php if ('ja' != $locale) : ?>
                <a class="btn btn-sm btn-outline-light" href="<?= base_url('ja') ?>">日</a>
            <?php endif; ?>
        </div>
        <div class="col-12 col-md-6">
            <img src="<?= base_url('assets/logo.png') ?>" class="img-fluid mb-5" alt="<?= lang('Page.company.title') ?>" />
            <h1><?= lang('Page.company.hero') ?></h1>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-12">
            <img src="<?= base_url('assets/intro_1.jpg') ?>" class="img-thumbnail border-2 border-warning ms-3 float-end" alt="<?= lang('Page.company.title') ?>" style="max-width:40vw;" />
            <h1><?= lang('Page.intro.title') ?></h1>
            <h2><?= lang('Page.intro.h1') ?></h2>
            <p><?= lang('Page.intro.p1') ?></p>
            <h2><?= lang('Page.intro.h2') ?></h2>
            <p><?= lang('Page.intro.p2') ?></p>
            <img src="<?= base_url('assets/intro_2.jpg') ?>" class="img-thumbnail border-2 border-warning me-3 float-start" alt="<?= lang('Page.company.title') ?>" style="max-width:40vw;" />
            <h2><?= lang('Page.intro.h3') ?></h2>
            <p><?= lang('Page.intro.p3') ?></p>
            <h2><?= lang('Page.intro.h4') ?></h2>
            <p><?= lang('Page.intro.p4') ?></p>
            <h2><?= lang('Page.intro.h5') ?></h2>
            <p><?= lang('Page.intro.p5') ?></p>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-12">
            <h1><?= lang('Page.trackman.title') ?></h1>
            <img src="<?= base_url('assets/intro_3.png') ?>" class="img-thumbnail border-2 border-warning ms-3 float-end" alt="<?= lang('Page.company.title') ?>" style="max-width:40vw;" />
            <h2><?= lang('Page.trackman.h1') ?></h2>
            <p><?= lang('Page.trackman.p1') ?></p>
            <h2><?= lang('Page.trackman.h2') ?></h2>
            <p><?= lang('Page.trackman.p2') ?></p>
            <h2><?= lang('Page.trackman.h3') ?></h2>
            <p><?= lang('Page.trackman.p3') ?></p>
            <h2><?= lang('Page.trackman.h4') ?></h2>
            <p><?= lang('Page.trackman.p4') ?></p>
            <h2><?= lang('Page.trackman.h5') ?></h2>
            <p><?= lang('Page.trackman.p5') ?></p>
        </div>
    </div>
    <!-- REVIEW -->
    <div class="row py-5">
        <div class="col">
            <h1 id="reviews"><?= lang('Page.review') ?></h1>
            <div class="row g-3">
                <?php $reviews = lang('Page.reviews'); ?>
                <?php foreach ($reviews as $i => $review) : ?>
                    <div class="col-12 col-md-6 col-lg-4 d-flex">
                        <div class="card w-100">
                            <div class="card-body p-4">
                                <img class="rounded-circle mb-5" src="<?= base_url('assets/review_' . $i . '.png') ?>" />
                                <h3><?= $review['name'] ?></h3>
                                <p><?= $review['text'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- INSTRUCTOR -->
    <div class="row py-5">
        <div class="col">
            <h1 id="instructors"><?= lang('Page.instructor.title') ?></h1>
            <?php $instructors = lang('Page.instructors'); ?>
            <?php foreach ($instructors as $i => $instructor) : ?>
                <div class="row g-3">
                    <div class="col">
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <img class="img-thumbnail border-warning border-3 rounded-3 float-start me-3 mb-3" src="<?= base_url('assets/instructor_' . $i . '.jpg') ?>" style="max-width:40vw" />
                                <h2><?= $instructor['name'] ?></h2>
                                <h3><?= $instructor['full_name'] ?></h3>
                                <p><?= $instructor['certified'] ?></p>
                            </div>
                            <div class="col-12 col-md-6">
                                <h3><?= lang('Page.instructor.languages') ?></h3>
                                <p><?= $instructor['languages'] ?></p>
                                <h3><?= lang('Page.instructor.social_media') ?></h3>
                                <p>- <?= str_replace("\n", '<br>- ', $instructor['social_media']) ?></p>
                            </div>
                        </div>
                        <div class="row g-3 mb-5">
                            <div class="col-12 col-md-6 col-lg-4 d-flex">
                                <div class="card w-100">
                                    <div class="card-body">
                                        <h3><?= lang('Page.instructor.certificates') ?></h3>
                                        <p>- <?= str_replace("\n", '<br>- ', $instructor['certificates']) ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 d-flex">
                                <div class="card w-100">
                                    <div class="card-body">
                                        <h3><?= lang('Page.instructor.experiences') ?></h3>
                                        <p>- <?= str_replace("\n", '<br>- ', $instructor['experiences']) ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 d-flex">
                                <div class="card w-100">
                                    <div class="card-body">
                                        <h3><?= lang('Page.instructor.education') ?></h3>
                                        <p>- <?= str_replace("\n", '<br>- ', $instructor['education']) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h1 id="contact"><?= lang('Page.contact.title') ?></h1>
        </div>
        <div class="col-12 col-md-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3876.848567529463!2d100.60270450000002!3d13.666970500000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2a10c12b0713b%3A0x70115d98f459203e!2sWisdom%20Golf%20Academy!5e0!3m2!1sen!2ssg!4v1742289672594!5m2!1sen!2ssg" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="float-end">
                <a href="https://maps.app.goo.gl/KQzBJsFxNJ4rxVxf9" target="_blank" class="btn btn-outline-warning"><i class="fa-solid fa-location-dot"></i> <?= lang('Page.contact.open_map') ?></a>
            </div>
        </div>
        <div class="col-12 col-md-6 pb-5">
            <h2><?= lang('Page.contact.phone') ?></h2>
            <p><a href="tel:+669591597834" target="_blank">095-915-97834</a></p>
            <h2><?= lang('Page.contact.email') ?></h2>
            <p><a href="mailto:wisdomgolfacademy@gmail.com" target="_blank">wisdomgolfacademy@gmail.com</a></p>
            <h2><?= lang('Page.contact.address') ?></h2>
            <p><?= lang('Page.contact.address_value') ?></p>
            <h2><?= lang('Page.contact.social') ?></h2>
            <p>
                <a class="btn btn-outline-warning rounded-circle btn-social" href="https://lin.ee/rn94ZqL" target="_blank"><i class="fa-brands fa-line"></i></a>
                <a class="btn btn-outline-warning rounded-circle btn-social" href="https://www.facebook.com/profile.php?id=61569536114185" target="_blank"><i class="fa-brands fa-square-facebook"></i></a>
                <a class="btn btn-outline-warning rounded-circle btn-social" href="https://www.instagram.com/wisdom.golfacademy/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                <a class="btn btn-outline-warning rounded-circle btn-social" href="https://www.tiktok.com/@wisdomgolfacademy?is_from_webapp=1&sender_device=pc" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                <a class="btn btn-outline-warning rounded-circle btn-social" href="https://www.youtube.com/@WisdomGolfAcademy" target="_blank"><i class="fa-brands fa-square-youtube"></i></a>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col text-center">
            <hr />
            <?= lang('Page.company.copyright', [date('Y')]) ?>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/bootstrap-5.3.3/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/aos/aos.js') ?>"></script>
</body>
</html>