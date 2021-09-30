<a name="upcoming"></a>
<section class="ftco-section ftco-no-pb <?=$class?>">
    <div class="container">
        <div class="row justify-content-center pb-3">
            <div class="col-md-10 heading-section text-center ftco-animate">
                <span class="subheading"><?=__('Events')?></span>
                <h2 class="mb-4"><?=$aPages['event-upcoming']['Page']['title']?></h2>
                <?=$aPages['event-upcoming']['Page']['body']?>
                <p class="mt-3">
                    <?=$this->element('more', array('url' => $this->Html->url(array('controller' => 'pages', 'action' => 'view', 'reality-transformation'))))?>
                    <a href="#register" class="btn btn-primary btn-outline-primary py-2"><?=__('Register')?></a>
                </p>
            </div>
        </div>
    </div>
</section>