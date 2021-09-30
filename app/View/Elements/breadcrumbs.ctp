<?
	if (!$aBreadcrumbs) { 
		$aBreadcrumbs = $this->Breadcrumbs->getList();
	}
?>
<p class="breadcrumbs">
<?
	foreach($aBreadcrumbs as $title => $url) {
		if ($url) {
?>
			<a href="<?=$this->Html->url($url)?>"><?=$title?>&nbsp;&nbsp;&nbsp;<i class="ionicons ion-md-arrow-forward"></i></a>&nbsp;&nbsp;&nbsp;
<?
		} else {
?>
				<span><?=$title?></span>
<?
		}
	}
?>
</p>