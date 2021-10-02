<div class="home">
    <!-- Hero Slider -->
    <div class="hero_slider_container">
        <div class="hero_slider owl-carousel">
<?
    foreach($aSlides as $slide) {
?>
            <div class="hero_slide">
                <div class="hero_slide_background" style="background-image:url(<?=$this->Media->imageUrl($slide, 'noresize', '')?>)"></div>
                <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
                    <div class="hero_slide_content text-center">
                        <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut"><?=$slide['Slider']['title']?></h1>
                    </div>
                </div>
            </div>
<?
    }
?>
        </div>

        <div class="hero_slider_left hero_slider_nav trans_200"><span class="trans_200"><i class="fa fa-angle-left"></i></span></div>
        <div class="hero_slider_right hero_slider_nav trans_200"><span class="trans_200"><i class="fa fa-angle-right"></i></span></div>
    </div>
</div>