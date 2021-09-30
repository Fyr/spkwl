<a name="shop"></a>
<section class="ftco-section ftco-team <?=$class?>">
    <div class="container-fluid px-md-5">
        <div class="row justify-content-center pb-3">
            <div class="col-md-10 heading-section text-center ftco-animate">
                <span class="subheading"><?=__('Shop')?></span>
                <h2 class="mb-4"><?=$aPages['home-shop']['Page']['title']?></h2>
                <?=$aPages['home-shop']['Page']['body']?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="carousel-team owl-carousel">
<?
    foreach($aCategories as $cat_id => $article) {
        $this->ArticleVars->init($article, $url, $title, $teaser, $src, '800x');
?>
                    <div class="item">
                        <a href="<?=$url?>" class="team text-center">
                            <div class="img" style="background-image: url(<?=$src?>);"></div>
                            <h2><?=$title?></h2>
                            <!--span class="position"><?=$teaser?></span-->
                        </a>
                    </div>
<?
    }
?>
                </div>
            </div>
        </div>
    </div>
</section>
