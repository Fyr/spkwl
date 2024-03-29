<?
	if ($page['home']) {
		echo $this->element('text_block', array('page' => $page['home']));
	}
	// echo $this->element('popular');
	// echo $this->element('register');
?>

<!-- Services -->
<a name="services"></a>
<div class="services page_section article bkg-grey">
	
	<div class="container">
		<div class="row">
			<div class="col">
				<?=$this->element('title', array('title' => __('Services')))?>
			</div>
		</div>

		<div class="row services_row">
<?
	foreach($aServices as $service) {
		$title = $service['Service']['title'];
		$body = $service['Service']['body'];
?>

			<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
				<div class="icon_container d-flex flex-column justify-content-end">
					<img src="<?=$this->Media->imageUrl($service, 'thumb200x200x')?>" alt="<?=$title?>">
				</div>
				<h3><?=$title?></h3>
				<?=$body?>
			</div>
<?
	}
?>
		</div>
	</div>
</div>

<a name="faq"></a>
<div class="page_section article">
	<div class="container">
		<div class="row">
			<div class="col">
				<?=$this->element('title', array('title' => __('FAQ')))?>
			</div>
		</div>

		<!-- Accordions -->
		<div class="elements_accordions">
<?
	foreach($aFaq as $faq) {
?>
			<div class="accordion_container">
				<div class="accordion d-flex flex-row align-items-center"><?=$faq['Faq']['question']?></div>
				<div class="accordion_panel">
					<?=$faq['Faq']['answer']?>
				</div>
			</div>
<?
	}
?>
		</div>
	</div>

</div>

<!-- Testimonials -->
<a name="testimonials"></a>
<div class="testimonials page_section">
	<div class="testimonials_background_container prlx_parent">
		<div class="testimonials_background prlx" style="background-image:url(/img/testimonials.jpg)"></div>
	</div>
	<div class="container">

		<div class="row">
			<div class="col">
				<?=$this->element('title', array('title' => __('What our students say')))?>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				
				<div class="testimonials_slider_container">

					<!-- Testimonials Slider -->
					<div class="owl-carousel owl-theme testimonials_slider">
<?
	foreach($aFeedbacks as $feedback) {
		$name = $feedback['Feedback']['name'];
		$title = $feedback['Feedback']['title'];
		$body = $feedback['Feedback']['body'];
?>
						<!-- Testimonials Item -->
						<div class="owl-item">
							<div class="testimonials_item text-center">
								<div class="testimonials_text">
									<?=$body?>
								</div>
								<div class="testimonial_user">
<?
		if (Hash::get($feedback, 'Media.id')) {
			$src = $this->Media->imageUrl($feedback, 'thumb200x200');
?>
									<div class="testimonial_image mx-auto">
										<img src="<?=$src?>" alt="<?=$name?>">
									</div>
<?
		}
?>
									<div class="testimonial_name"><?=$name?></div>
									<div class="testimonial_title"><?=$title?></div>
								</div>
							</div>
						</div>
<?
	}
?>

					</div>

				</div>
			</div>
		</div>

	</div>
</div>

<?
	if ($page['about-us']) {
		echo $this->element('text_block', array('page' => $page['about-us']));
	}
?>
<!-- Events -->

<div class="events page_section bkg-grey">
	<div class="container">
		<div class="row">
			<div class="col">
				<?=$this->element('title', array('title' => __('News')))?>
			</div>
		</div>
		
		<div class="event_items">

<?
	foreach($aFeaturedNews as $article) {
        $this->ArticleVars->init($article, $url, $title, $teaser, $src, 'thumb350x200', $id);
		$date = $article['News']['modified'];
?>
			<!-- Event Item -->
			<div class="row event_item">
				<div class="col">
					<div class="row d-flex flex-row">

						<div class="col-lg-2 order-lg-1 order-2">
							<div class="event_date d-flex flex-column align-items-center justify-content-center">
								<div class="event_day"><?=date('d', strtotime($date))?></div>
								<div class="event_month"><?=__(date('M', strtotime($date)))?></div>
							</div>
						</div>

						<div class="col-lg-6 order-lg-2 order-3">
							<div class="event_content">
								<div class="event_name"><a class="trans_200" href="<?=$url?>"><?=$title?></a></div>
								<?/* <div class="event_location">Grand Central Park</div--> */?>
								<p><?=$teaser?></p>
							</div>
						</div>

						<div class="col-lg-4 order-lg-3 order-1">
							<div class="event_image">
								<a href="<?=$url?>" title="<?=$title?>">
									<img src="<?=$src?>" alt="<?=$title?>" />
								</a>
							</div>
						</div>

					</div>	
				</div>
			</div>
<?
	}
?>
		</div>
	</div>
</div>