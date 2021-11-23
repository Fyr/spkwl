<!-- Footer -->
<footer class="footer">
	<div class="container">
		
		<!-- Footer Content -->
		<div class="footer_content">
			<div class="row">

				<!-- Footer Column - About -->
				<div class="col-lg-4 footer_col">

					<!-- Logo -->
					<div class="logo_container">
						<div class="logo">
							<img src="/img/tmp/logo.png" alt="" />
							<span><?=Configure::read('domain.name')?></span>
						</div>
					</div>

					<p class="footer_about_text"><?=nl2br($this->Settings->read('teaser'))?></p>

				</div>

				<!-- Footer Column - Menu -->

				<div class="col-lg-2 footer_col">
					<div class="footer_column_title"><?=__('Links')?></div>
					<div class="footer_column_content">
						<ul>
<?
    foreach($aNavBar as $curr => $item) {
        $active = ($curr == $currMenu) ? ' active' : '';
?>
                                <li class="footer_list_item<?=$active?>"><?=$this->Html->link(__($item['title']), $item['url'])?></li>
<?
    }
?>
						</ul>
					</div>
				</div>

				<!-- Footer Column - Usefull Links -->

				<div class="col-lg-3 footer_col">
					<div class="footer_column_title"><?=__('For clients')?></div>
					<div class="footer_column_content">
						<ul>
							<li class="footer_list_item"><a href="/#testimonials"><?=__('What our students say')?></a></li>
							<li class="footer_list_item"><a href="/#faq"><?=__('FAQ')?></a></li>
						</ul>
					</div>
				</div>

				<!-- Footer Column - Contact -->

				<div class="col-lg-3 footer_col">
					<div class="footer_column_title"><?=__('Contacts')?></div>
					<div class="footer_column_content">
						<ul>
<?
	$aItems = array(
		'phone' => 'icon icon-phone',
		'email' => 'icon icon-envelope',
		'skype' => 'icon icon-skype',
		'telegram' => 'icon icon-telegram'
	);
	foreach($aItems as $setting => $icon) {
		$setting = $this->Settings->read($setting);
		if ($setting) {
?>

							<li class="footer_contact_item">
								<span class="<?=$icon?>"></span>
								<?=$setting?>
							</li>
<?
		}
	}
?>
						</ul>
					</div>
				</div>

			</div>
		</div>

		<!-- Footer Copyright -->

		<!--div class="footer_bar d-flex flex-column flex-sm-row align-items-center">
<? /*
			<div class="footer_copyright">
				<span>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</span>
			</div>
*/ ?>
			<div class="footer_social ml-sm-auto">
				<ul class="menu_social">
					<li class="menu_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
					<li class="menu_social_item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
					<li class="menu_social_item"><a href="#"><i class="fab fa-instagram"></i></a></li>
					<li class="menu_social_item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
					<li class="menu_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li>
				</ul>
			</div>
		</div-->

	</div>
</footer>