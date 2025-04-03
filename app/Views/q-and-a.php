<?php
$this->extend('_layout.php');
$this->section('content');
?>
    <h1 class="d-none"><?= lang('Theme.navigations.q-and-a') ?></h1>
    <section id="qna" class="contact section pt-0">
        <!-- Section Title -->
        <div class="container section-title mt-5 pb-3" data-aos="fade-up">
            <h2><span class="d-none"><?= lang('Theme.navigations.q-and-a') ?></span> <i class="fa-solid fa-chevron-right"></i><i class="fa-solid fa-chevron-right"></i></h2>
            <p><?= lang('Theme.navigations.q-and-a') ?></p>
        </div><!-- End Section Title -->
    </section>
    <section class="qna section pt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <?php $answers = lang('QNA.links'); ?>
                            <ul class="list-group list-group-flush">
                                <?php foreach (lang('QNA.questions') as $i => $question) : ?>
                                    <li class="list-group-item">
                                        <div class="float-end"><a href="<?= $answers[$i] ?>" target="_blank"><i class="fa-solid fa-circle-play fa-2x"></i></a></div>
                                        <span style="line-height:2em;vertical-align:center;"><?= $question ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
$this->endSection();
?>
