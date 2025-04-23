<?php
$this->extend('_layout.php');
$this->section('content');
?>
<h1 class="d-none"><?= lang('Theme.navigations.q-and-a') ?> - <?= lang('Seo.all-pages.keywords') ?></h1>
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
            <div class="col">
                <p><?= lang('QNA.paragraph') ?></p>
                <div class="row">
                    <div class="col-12 col-md-8 col-lg-6 mb-3">
                        <label for="search-box" class="d-none"><?= lang('Theme.search') ?></label>
                        <input class="form-control" type="text" id="search-box" placeholder="<?= lang('Theme.search') ?>...">
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <?php $answers = lang('QNA.links'); ?>
                        <ul id="qna-list" class="list-group list-group-flush">
                            <?php foreach (lang('QNA.questions') as $i => $question) : ?>
                                <li class="list-group-item">
                                    <div class="float-end"><a href="<?= $answers[$i] ?>" target="_blank"><i class="fa-solid fa-circle-play fa-2x"></i></a></div>
                                    <span style="line-height:2em;vertical-align:center;" data-original="<?= htmlentities($question) ?>"><?= $question ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <script>
                    document.getElementById('search-box').addEventListener('keyup', function () {
                        const searchTerm = this.value.toLowerCase();
                        const items = document.querySelectorAll('#qna-list li');
                        items.forEach(item => {
                            const span = item.querySelector('span');
                            const originalText = span.getAttribute('data-original');
                            const lowerText = originalText.toLowerCase();
                            if (!searchTerm) {
                                span.innerHTML = originalText;
                                item.style.display = '';
                            } else if (lowerText.includes(searchTerm)) {
                                const startIndex = lowerText.indexOf(searchTerm);
                                const endIndex = startIndex + searchTerm.length;
                                span.innerHTML = originalText.substring(0, startIndex) +
                                    '<mark>' + originalText.substring(startIndex, endIndex) + '</mark>' +
                                    originalText.substring(endIndex);
                                item.style.display = '';
                            } else {
                                span.innerHTML = originalText;
                                item.style.display = 'none';
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</section>
<?php
$this->endSection();
?>
