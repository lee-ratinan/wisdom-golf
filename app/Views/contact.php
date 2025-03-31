<?php
$this->extend('_layout.php');
$this->section('content');
?>
    <h1 class="d-none"><?= lang('Theme.navigations.contact') ?></h1>
    <!-- Contact Section -->
    <section id="contact" class="contact section mt-5 pt-5">
        <!-- Section Title -->
        <div class="container section-title mt-5" data-aos="fade-up">
            <h2><span class="d-none"><?= lang('Contact.title') ?></span> <i class="fa-solid fa-chevron-right"></i><i class="fa-solid fa-chevron-right"></i></h2>
            <p><?= lang('Contact.title') ?></p>
        </div><!-- End Section Title -->
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-6 ">
                    <div class="row gy-4">
                        <div class="col-lg-12">
                            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
                                <i class="bi bi-geo-alt"></i>
                                <h3><?= lang('Contact.address') ?></h3>
                                <p><?= lang('Theme.footer.address_line_1') ?></p>
                                <p><?= lang('Theme.footer.address_line_2') ?></p>
                            </div>
                        </div><!-- End Info Item -->
                        <div class="col-md-6">
                            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-telephone"></i>
                                <h3><?= lang('Contact.call-us') ?></h3>
                                <p><a href="tel:<?= getenv('CONTACT_TEL') ?>" target="_blank"><?= getenv('CONTACT_TEL_LABEL') ?></a></p>
                            </div>
                        </div><!-- End Info Item -->
                        <div class="col-md-6">
                            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
                                <i class="bi bi-envelope"></i>
                                <h3><?= lang('Contact.email-us') ?></h3>
                                <p><a href="mailto:<?= getenv('CONTACT_EMAIL') ?>" target="_blank"><?= getenv('CONTACT_EMAIL') ?></a></p>
                            </div>
                        </div><!-- End Info Item -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4033.3359446042195!2d100.60270450000002!3d13.666970500000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2a10c12b0713b%3A0x70115d98f459203e!2sWisdom%20Golf%20Academy!5e1!3m2!1sen!2ssg!4v1743354577229!5m2!1sen!2ssg" style="border:0;height:450px;width:100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
<?php
$this->endSection();
?>