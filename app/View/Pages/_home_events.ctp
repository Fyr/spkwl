<section class="testimony-section <?=$class?>">
    <div class="container">
        <div class="row ftco-animate justify-content-center">
            <div class="col-md-6 col-lg-5 d-flex">
                <div class="testimony-img" style="background-image: url(<?=$this->Media->imageUrl($aPages['event-name'])?>);"></div>
            </div>
            <div class="col-md-6 col-lg-7 py-5 pl-md-5">
                <div class="py-md-5">
                    <div class="heading-section ftco-animate">
                        <span class="subheading"><?=$aPages['event-name']['Page']['title']?></span>
                        <h2 class="mb-0"><?=$aPages['event-name']['Page']['body']?></h2>
                    </div>
                    <div class="carousel-testimony owl-carousel ftco-animate">
<?
    $trainer = 'Татьяна Березовская';
    $trainer2 = "Сергей Филиппов";
    foreach($aEvents as $event) {
        $page = $event['Page'];
?>
                        <div class="item">
                            <div class="testimony-wrap pb-1">
                                <div class="text">
                                    <h3><?=$page['title']?></h3>
                                    <?=str_replace('<p>', '<p class="mb-1">', $page['body'])?>
                                </div>
                                <!--div class="d-flex">
                                    <div class="user-img" style="background-image: url(/img/tmp/stylist-1.jpg)"></div>
                                    <div class="pos ml-3">
                                        <p class="name">Jeff Nucci</p>
                                        <span class="position">Businessman</span>
                                    </div>
                                </div-->
                            </div>
                        </div>

<?
    }
?>
                    </div>
                    <p class="mt-3" style="text-align: center">
                        <?=$this->element('more', array('url' => $this->Html->url(array('controller' => 'pages', 'action' => 'view', 'reality-transformation'))))?>
                        <a href="#register" class="btn btn-primary btn-outline-primary py-2"><?=__('Register')?></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>