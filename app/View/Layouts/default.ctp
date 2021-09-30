<!DOCTYPE html>
<html lang="en">
<head>
    <?=$this->Html->charset()?>
    <title><?=Configure::read('domain.title')?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"-->
    <!--link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:500,600,700&display=swap" rel="stylesheet"-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:500,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:500,600,700&display=swap" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
<?

    echo $this->Html->css(array(
        'open-iconic-bootstrap.min',
        'animate',
        'owl.carousel.min',
        'owl.theme.default.min',
        'magnific-popup',
        'aos',
        'ionicons.min',
        'bootstrap-datepicker',
        'jquery.timepicker',
        'flaticon',
        'icomoon',
        'style',
        'extra'
    ));

    echo $this->Html->meta('icon');
    echo $this->fetch('meta');
    echo $this->fetch('css');
?>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/"><span class="flaticon-north"></span><?=Configure::read('domain.name')?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
<?
    foreach($aNavBar as $menu => $item) {
        $class = ($menu === $currMenu) ? ' active' : '';
?>
            <li class="nav-item<?=$class?>"><a href="<?=$this->Html->url($item['url'])?>" class="nav-link"><?=$item['title']?></a></li>

<?
    }
?>

            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->

<!-- Header start -->
<section class="hero-wrap js-fullheight" style="background-image: url(<?=$this->Media->imageUrl($promoImages['PromoHeader'])?>);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight justify-content-center align-items-center">
            <div class="col-lg-12 ftco-animate d-flex align-items-center">
                <div class="text text-center">
                    <span class="subheading"><?=$this->Settings->read('slogan_header')?></span>
                    <h1 class="mb-4 <?=($currMenu && $currMenu !== 'Home') ? 'text-white-50' : '' ?>"><?=$this->Settings->read('slogan_text')?></h1>
                    <p><a href="<?=$this->Settings->read('slogan_link_url')?>" class="btn btn-primary btn-outline-primary px-4 py-2"><?=$this->Settings->read('slogan_link_text')?></a></p>
<?
    if ($currMenu && $currMenu !== 'Home') {
        echo $this->element('page_title', ($pageTitle) ? array('title' => $pageTitle) : $aNavBar[$currMenu]);
    }
    if ($currMenu !== 'Home') {
        echo $this->element('breadcrumbs');
    }
?>                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Header end -->

<!-- Promo start -->
<a name="about-us"></a>
<section class="ftco-section ftco-no-pt ftco-no-pb <?=$class?>">
    <div class="container-fluid px-0">
        <div class="row no-gutters">
            <div class="col-md text-center d-flex align-items-stretch">
                <div class="services-wrap d-flex align-items-center img" style="background-image: url(<?=$this->Media->imageUrl($promoImages['PromoLeft'], '400x')?>);">
                    <div class="text">
                        <h3><?=$this->Settings->read('promo_title_left')?></h3>
                        <p><?=nl2br($this->Settings->read('promo_text_left'))?></p>
                        <?=($url = $this->Settings->read('promo_link_left')) ? $this->element('more', compact('url')) : ''?>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center d-flex align-items-stretch">
                <div class="text-about py-5 px-4">
                    <h1 class="logo">
                        <a href="/"><span class="flaticon-north"></span><?=Configure::read('domain.name')?></a>
                    </h1>
                    <h2><?=$this->Settings->read('promo_title_main')?></h2>
                    <p><?=nl2br($this->Settings->read('promo_text_main'))?></p>
                    <?=($url = $this->Settings->read('promo_link_main')) ? $this->element('more', compact('url')) : ''?>
                </div>
            </div>
            <div class="col-md text-center d-flex align-items-stretch">
                <div class="services-wrap d-flex align-items-center img" style="background-image: url(<?=$this->Media->imageUrl($promoImages['PromoRight'], '400x')?>);">
                    <div class="text">
                        <h3><?=$this->Settings->read('promo_title_right')?></h3>
                        <p><?=nl2br($this->Settings->read('promo_text_right'))?></p>
                        <?=($url = $this->Settings->read('promo_link_right')) ? $this->element('more', compact('url')) : ''?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Promo end -->

<?=$this->fetch('content')?>

<footer class="ftco-footer ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2 logo"><?=__('Consultations')?></h2>
                    <p><?=nl2br(Configure::read('Settings.worktime'))?></p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft">
                        <!--li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li-->
<?
    foreach(array('facebook', 'instagram') as $social) {
        $url = Configure::read("Settings.".$social);
        if ($url) {
?>
                        <li class="ftco-animate"><a href="<?=$url?>"><span class="icon-<?=$social?>"></span></a></li>
<?
        }
    }
?>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2"><?=__('Links')?></h2>
                    <ul class="list-unstyled">
<?
    $class = ''; // ' active';
    foreach($aNavBar as $item) {
?>
                        <li><a href="<?=$this->Html->url($item['url'])?>" class="py-2 d-block<?=$class?>"><?=$item['title']?></a></li>

<?
    }
?>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2"><?=__('Have a Question?')?></h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <!-- li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li-->
<?
    $aContacts = array(
        'envelope' => 'email',
        'skype' => 'skype',
        'telegram' => 'telegram'
    );
    foreach($aContacts as $icon => $setting) {
        $contact = $this->Settings->read($setting);
        if ($contact) { 
?>

                            <li><span class="icon icon-<?=$icon?>"></span><a href="#"><span class="text"><?=$contact?></span></a></li>

<?
        }
    }
?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2"><?=__('Information')?></h2>
                    <ul class="list-unstyled">
                        <li><a href="#services" class="py-2 d-block"><?=__('For clients')?></a></li>
                        <li><a href="mailto:fyr@tut.by?subject=AstroTarolog.info%20Tech.support" class="py-2 d-block"><?=__('Tech.support')?></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center ftco-footer-widget">
                <h2 class="ftco-heading-2" style="color: #fff">
                    <span class="flaticon-north" style="font-size: 4rem; position: relative; top: 1rem"></span> Astro<span style="color: #bf925b">Tarolog</span>.info
                </h2>
                <!--p><Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.>
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.></p-->

            </div>
        </div>
    </div>
</footer>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<?
    echo $this->Html->script(array(
        'vendor/jquery.min',
        'vendor/jquery-migrate-3.0.1.min',
        'vendor/popper.min',
        'vendor/bootstrap.min',
        'vendor/jquery.easing.1.3',
        'vendor/jquery.waypoints.min',
        'vendor/jquery.stellar.min',
        'vendor/owl.carousel.min',
        'vendor/jquery.magnific-popup.min',
        'vendor/aos',
        'vendor/jquery.animateNumber.min',
        'vendor/bootstrap-datepicker',
        'vendor/jquery.timepicker.min',
        'vendor/scrollax.min',
        'vendor/google-map',
        'main',
        // '/Core/js/json_handler'
    ));
    echo $this->fetch('script');
    // echo $this->element('sql_dump');
?>
</body>
</html>