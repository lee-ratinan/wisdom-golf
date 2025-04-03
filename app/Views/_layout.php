<!DOCTYPE html>
<html lang="<?= $locale ?>">
<head>
    <?php
    $locale_nav = $locale . '/';
    $handle_nav = ('home' == $handle ? '' : $handle);
    ?>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?= $page ?> - <?= lang('Theme.title') ?></title>
    <meta name="description" content="<?= lang('Seo.' . $handle . '.description') ?>">
    <meta name="keywords" content="<?= lang('Seo.' . $handle . '.keywords') ?>">
    <meta name="author" content="<?= lang('Theme.author') ?>">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="<?= $page ?> - <?= lang('Theme.title') ?>">
    <meta property="og:description" content="<?= lang('Seo.' . $handle . '.description') ?>">
    <meta property="og:image" content="<?= base_url('img/home-intro.jpg') ?>">
    <meta property="og:url" content="<?= base_url($locale_nav . $handle_nav) ?>">
    <!-- Favicons -->
    <link href="<?= base_url('img/favicon-180.png') ?>" rel="icon">
    <link href="<?= base_url('img/favicon-192.png') ?>" rel="apple-touch-icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <?php if (in_array($locale, ['th', 'ja'])): ?>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
    <?php endif; ?>
    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/aos/aos.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/fontawesome-free-6.7.2/css/all.min.css') ?>" rel="stylesheet">
    <!-- Main CSS File -->
    <link href="<?= base_url('assets/css/main.min.css') ?>" rel="stylesheet">
    <!-- Link Languages -->
    <link rel="alternate" hreflang="en" href="<?= base_url('en/' . $handle_nav) ?>">
    <link rel="alternate" hreflang="th" href="<?= base_url('th/' . $handle_nav) ?>">
    <link rel="alternate" hreflang="ja" href="<?= base_url('ja/' . $handle_nav) ?>">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?= getenv('ANALYTICS_ID') ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', '<?= getenv('ANALYTICS_ID') ?>');
    </script>
    <?php $fonts = ('th' == $locale ? 'Noto Sans Thai' : ('ja' == $locale ? 'Noto Sans JP' : '')); ?>
    <?php if (!empty($fonts)): ?><style>body,h1,h2,h3,h4,p,span,.navmenu a, .navmenu a:focus {font-family: '<?= $fonts ?>', sans-serif !important;}</style><?php endif; ?>
    <?php /* -- =======================================================
    * Template Name: Dewi
    * Template URL: https://bootstrapmade.com/dewi-free-multi-purpose-html-template/
    * Updated: Aug 07 2024 with Bootstrap v5.3.3
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== */ ?>
</head>
<body class="index-page">
<!-- Upper Header -->
<div class="upper-header header-orange py-2 d-none d-lg-flex justify-content-between px-4">
    <div>
        <img src="<?= base_url('img/logo-horizontal-white.png') ?>" alt="<?= lang('Theme.title') ?>" height="50">
    </div>
    <div>
        <a class="contact-link me-3" href="tel:<?= getenv('CONTACT_TEL') ?>" target="_blank">
            <i class="fa-solid fa-phone"></i>
            <?= getenv('CONTACT_TEL_LABEL') ?>
        </a>
        <a class="contact-link btn btn-line rounded-pill" href="<?= getenv('CONTACT_LINE') ?>" target="_blank">
            <i class="fa-brands fa-line"></i>
            ADD FRIEND <span class="d-none"><?= lang('Theme.navigations.line') ?></span>
        </a>
    </div>
</div>
<!-- Lower Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light sticky-header header-orange text-white">
    <div class="container-fluid">
        <a class="navbar-brand d-lg-none" href="#"><img src="<?= base_url('img/logo-horizontal-white.png') ?>" alt="<?= lang('Theme.title') ?>" height="50"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="<?= base_url($locale_nav) ?>"><?= lang('Theme.navigations.home') ?></a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url($locale_nav . 'instructors') ?>"><?= lang('Theme.navigations.instructors') ?></a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url($locale_nav . 'reviews') ?>"><?= lang('Theme.navigations.reviews') ?></a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url($locale_nav . 'q-and-a') ?>"><?= lang('Theme.navigations.q-and-a') ?></a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url($locale_nav . 'packages') ?>"><?= lang('Theme.navigations.packages') ?></a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url($locale_nav . 'contact') ?>"><?= lang('Theme.navigations.contact') ?></a></li>
            </ul>
            <div class="d-flex gap-2">
                <a href="<?= base_url('en/' . $handle_nav) ?>"><img src="<?= base_url('img/flag-us-rec.svg') ?>" alt="English" title="English" class="language-flag flag-nav"></a>
                <a href="<?= base_url('th/' . $handle_nav) ?>"><img src="<?= base_url('img/flag-th-rec.svg') ?>" alt="ภาษาไทย" title="ภาษาไทย" class="language-flag flag-nav"></a>
                <a href="<?= base_url('ja/' . $handle_nav) ?>"><img src="<?= base_url('img/flag-jp-rec.svg') ?>" alt="日本語" title="日本語" class="language-flag flag-nav"></a>
            </div>
        </div>
    </div>
</nav>
<main class="main">
    <?= $this->renderSection('content') ?>
    <!-- CONTACT FORM -->
    <section id="contact" class="contact section">
        <div class="container">
            <form action="<?= base_url('form-submission') ?>" method="post" class="php-email-form aos-init aos-animate" data-aos="fade-up" data-aos-delay="1000">
                <div class="row gy-4">
                    <div class="col-12"><h2><i class="fa-regular fa-envelope"></i> <?= lang('Contact.form.title') ?></h2></div>
                    <div class="col-md-12">
                        <label for="name" class="w-100"><span class="d-none"><?= lang('Contact.form.name') ?></span>
                            <input type="text" id="name" class="form-control" name="name" placeholder="<?= lang('Contact.form.name') ?>" required="">
                        </label>
                    </div>
                    <div class="col-md-6 ">
                        <label for="email" class="w-100"><span class="d-none"><?= lang('Contact.form.email') ?></span>
                            <input type="email" id="email" class="form-control" name="email" placeholder="<?= lang('Contact.form.email') ?>" required="">
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="w-100"><span class="d-none"><?= lang('Contact.form.phone') ?></span>
                            <input type="text" id="phone" class="form-control" name="phone" placeholder="<?= lang('Contact.form.phone') ?>" required="">
                        </label>
                    </div>
                    <div class="col-md-12">
                        <label for="message" class="w-100"><span class="d-none"><?= lang('Contact.form.message') ?></span>
                            <textarea class="form-control" id="message" name="message" rows="4" placeholder="<?= lang('Contact.form.message') ?>" required=""></textarea>
                        </label>
                    </div>
                    <div class="col-md-12 text-center">
                        <div class="loading"></div>
                        <div class="error-message"><?= lang('Contact.responses.error') ?></div>
                        <div class="sent-message"><?= lang('Contact.responses.success') ?></div>
                        <button type="submit"><?= lang('Contact.form.button') ?></button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
<footer id="footer" class="footer dark-background">
    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-md-6 footer-about">
                <a href="<?= base_url() ?>" class="logo d-flex align-items-center">
                    <span class="sitename"><?= lang('Theme.title') ?></span>
                </a>
                <div class="footer-contact pt-3">
                    <p><?= lang('Theme.footer.address_line_1') ?></p>
                    <p><?= lang('Theme.footer.address_line_2') ?></p>
                    <p class="mt-3"><strong><?= lang('Theme.footer.phone_label') ?>:</strong> <a href="tel:<?= getenv('CONTACT_TEL') ?>" target="_blank"><?= getenv('CONTACT_TEL_LABEL') ?></a></p>
                    <p><strong><?= lang('Theme.footer.email_label') ?>:</strong> <a href="mailto:<?= getenv('CONTACT_EMAIL') ?>" target="_blank"><?= getenv('CONTACT_EMAIL') ?></a></p>
                </div>
                <div class="social-links d-flex mt-4">
                    <a href="<?= getenv('CONTACT_LINE') ?>" target="_blank"><i class="fa-brands fa-line"></i><span class="d-none">LINE</span></a>
                    <a href="<?= getenv('SOCIAL_FACEBOOK') ?>" target="_blank"><i class="fa-brands fa-facebook"></i><span class="d-none">Facebook</span></a>
                    <a href="<?= getenv('SOCIAL_INSTAGRAM') ?>" target="_blank"><i class="fa-brands fa-instagram"></i><span class="d-none">Instagram</span></a>
                    <a href="<?= getenv('SOCIAL_TIKTOK') ?>" target="_blank"><i class="fa-brands fa-tiktok"></i><span class="d-none">TikTok</span></a>
                    <a href="<?= getenv('SOCIAL_YOUTUBE') ?>" target="_blank"><i class="fa-brands fa-youtube"></i><span class="d-none">YouTube</span></a>
                </div>
            </div>
            <div class="col-md-6 footer-links pt-5">
                <h3><?= lang('Theme.footer.useful_links') ?></h3>
                <ul>
                    <li><i class="fa-solid fa-chevron-right me-2"></i> <a href="<?= base_url($locale_nav) ?>"><?= lang('Theme.navigations.home') ?></a></li>
                    <li><i class="fa-solid fa-chevron-right me-2"></i> <a href="<?= base_url($locale_nav . '/instructors') ?>"><?= lang('Theme.navigations.instructors') ?></a></li>
                    <li><i class="fa-solid fa-chevron-right me-2"></i> <a href="<?= base_url($locale_nav . '/reviews') ?>"><?= lang('Theme.navigations.reviews') ?></a></li>
                    <li><i class="fa-solid fa-chevron-right me-2"></i> <a href="<?= base_url($locale_nav . '/q-and-a') ?>"><?= lang('Theme.navigations.q-and-a') ?></a></li>
                    <li><i class="fa-solid fa-chevron-right me-2"></i> <a href="<?= base_url($locale_nav . '/packages') ?>"><?= lang('Theme.navigations.packages') ?></a></li>
                    <li><i class="fa-solid fa-chevron-right me-2"></i> <a href="<?= base_url($locale_nav . '/contact') ?>"><?= lang('Theme.navigations.contact') ?></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container copyright text-center mt-4">
        <?php $year = ('2025' == date('Y') ? '' : ' - ' . date('Y')); ?>
        <p><?= lang('Theme.footer.copyright', [$year]) ?></p>
    </div>
</footer>
<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i><span class="d-none"><?= lang('Theme.top') ?></span></a>
<!-- Preloader -->
<div id="preloader"></div>
<!-- Vendor JS Files -->
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/php-email-form/validate.js') ?>"></script>
<script src="<?= base_url('assets/vendor/aos/aos.js') ?>"></script>
<script src="<?= base_url('assets/vendor/glightbox/js/glightbox.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/swiper/swiper-bundle.min.js') ?>"></script>
<!-- Main JS File -->
<script src="<?= base_url('assets/js/main.min.js') ?>"></script>
</body>
</html>