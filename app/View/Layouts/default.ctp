<!DOCTYPE html>
<html lang="ru">
<head>
    <?=$this->Html->charset()?>
    <title><?=Configure::read('domain.title')?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Course Project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

<?
    echo $this->Html->css(array(
        'bootstrap.min',
        'fontawesome/css/fontawesome-all',
        'owl-carousel/owl.carousel',
        'owl-carousel/owl.theme.default',
        'owl-carousel/animate',
        'main_styles',
        'responsive',
		//'elements_styles',
		//'elements_responsive',
        'extra'
    ));

	echo $this->Html->script(array(
        'vendor/jquery-3.2.1.min'
	));
    echo $this->Html->meta('icon');
    echo $this->fetch('meta');
    echo $this->fetch('css');
?>
</head>
<body>
<div class="super_container">
	<!-- Header -->

	<header class="header d-flex flex-row">
		<div class="header_content d-flex flex-row align-items-center">
			<!-- Logo -->
			<div class="logo_container">
				<div class="logo">
					<img src="/img/tmp/logo.png" alt="">
					<span><?=Configure::read('domain.name')?></span>
				</div>
			</div>

			<!-- Main Navigation -->
			<nav class="main_nav_container">
				<div class="main_nav">
					<?=$this->element('main_menu', array('class' => 'main_nav_list'))?>
				</div>
			</nav>
		</div>
		<div class="header_side d-flex flex-row justify-content-center align-items-center">
			<img src="/img/tmp/phone-call.svg" alt="">
			<span>+43 4566 7788 2457</span>
		</div>

		<!-- Hamburger -->
		<div class="hamburger_container">
			<i class="fas fa-bars trans_200"></i>
		</div>

	</header>
	
	<!-- Menu -->
	<div class="menu_container menu_mm">

		<!-- Menu Close Button -->
		<div class="menu_close_container">
			<div class="menu_close"></div>
		</div>

		<!-- Menu Items -->
		<div class="menu_inner menu_mm">
			<div class="menu menu_mm">
				<ul class="menu_list menu_mm">
					<li class="menu_item menu_mm"><a href="#">Home</a></li>
					<li class="menu_item menu_mm"><a href="#">About us</a></li>
					<li class="menu_item menu_mm"><a href="courses.html">Courses</a></li>
					<li class="menu_item menu_mm"><a href="elements.html">Elements</a></li>
					<li class="menu_item menu_mm"><a href="news.html">News</a></li>
					<li class="menu_item menu_mm"><a href="contact.html">Contact</a></li>
				</ul>

				<!-- Menu Social -->
				
				<div class="menu_social_container menu_mm">
					<ul class="menu_social menu_mm">
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>
<?/*
				<div class="menu_copyright menu_mm">Colorlib All rights reserved</div>
*/?>
			</div>

		</div>

	</div>
	
	<!-- Home -->
<?
	echo $this->element('slider');
	echo $this->element('hero_boxes');
	echo $this->fetch('content');
	echo $this->element('footer');
?>
</div>
<?
    echo $this->Html->script(array(
        'vendor/popper',
        'vendor/bootstrap.min',
        'vendor/greensock/TweenMax.min',
        'vendor/greensock/TimelineMax.min',
        'vendor/ScrollMagic.min',
        'vendor/greensock/animation.gsap.min',
        'vendor/greensock/ScrollToPlugin.min',
        'vendor/owl.carousel',
        'vendor/jquery.scrollTo.min',
        'vendor/easing',
        'vendor/custom',
		'extra'
        // '/Core/js/json_handler'
    ));
    echo $this->fetch('script');
    // echo $this->element('sql_dump');
?>
</body>
</html>