<?
	$this->ArticleVars->init($article, $url, $title, $teaser, $src, '');
?>
<div class="page_section article">
	<div class="container">
		<div class="row">
			<?=$this->element('title', compact('title'))?>
			<?=$this->ArticleVars->body($article)?>
		</div>
	</div>
</div>