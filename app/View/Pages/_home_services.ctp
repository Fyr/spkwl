<a name="services"></a>
<section class="services-section ftco-section <?=$class?>">
    <div class="container">
        <div class="row justify-content-center pb-3">
            <div class="col-md-10 heading-section text-center ftco-animate">
                <span class="subheading"><?=__('Services')?></span>
                <h2 class="mb-4"><?=$aPages['home-services']['Page']['title']?></h2>
                <?=$aPages['home-services']['Page']['body']?>
            </div>
        </div>
        <div class="row no-gutters d-flex">
<?
    foreach($aServices as $item) {
?>
            <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block text-center">
                    <div class="icon"><span class="<?=$item['Service']['slug']?>"></span></div>
                    <div class="media-body">
                        <h3 class="heading mb-3"><?=$item['Service']['title']?></h3>
                        <?=$item['Service']['body']?>
                        <!--p class="mt-3"><a href="#" class="btn btn-primary btn-outline-primary"><?=__('More')?></a></p-->
                    </div>
                </div>
            </div>
<?
    }
?>
        </div>
    </div>
</section>