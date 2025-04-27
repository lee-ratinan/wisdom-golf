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
                </div>
            </div>
        </div>
    </section>
<script>document.getElementById("search-box").addEventListener("keyup",function(){let e=this.value.toLowerCase(),t=document.querySelectorAll("#qna-list li");t.forEach(t=>{let l=t.querySelector("span"),n=l.getAttribute("data-original"),s=n.toLowerCase();if(e){if(s.includes(e)){let i=s.indexOf(e),r=i+e.length;l.innerHTML=n.substring(0,i)+"<mark>"+n.substring(i,r)+"</mark>"+n.substring(r),t.style.display=""}else l.innerHTML=n,t.style.display="none"}else l.innerHTML=n,t.style.display=""})});</script>
<?php
$this->endSection();
?>
