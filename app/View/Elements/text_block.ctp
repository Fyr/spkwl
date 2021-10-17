<?
    $src = Hash::get($page, 'Media.id') ? $this->Media->imageUrl($page) : '';
?>
<a name="<?=$page['Page']['slug']?>"></a>
<div class="page_section article">
	<div class="container">
<?
    if ($src) {
?>

        <div class="row">
            <?=$this->element('title', array('title' => $page['Page']['title']))?>
            <div class="col-lg-6">
                <img src="<?=$src?>" alt="<?=$page['Page']['title']?>" />
            </div>
            <div class="col-lg-6">
                <?=$this->ArticleVars->body($page)?>
            </div>
		</div>

<?
    } else {
?>
		<div class="row">
			<?=$this->element('title', array('title' => $page['Page']['title']))?>
			<?=$this->ArticleVars->body($page)?>
		</div>
<?
    }
?>
	</div>
</div>