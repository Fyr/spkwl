<?
    if ($aFeaturedArticles) {
?>
<div class="hero_boxes">
    <div class="hero_boxes_inner">
        <div class="container">
            <div class="row">
<?
        $col = floor(12 / count($aFeaturedArticles));
        foreach($aFeaturedArticles as $article) {
            $this->ArticleVars->init($article, $url, $title, $teaser, $src, 'thumb200x200', $id);
?>
                <div class="col-lg-<?=$col?> hero_box_col">
                    <div class="hero_box d-flex flex-row align-items-center justify-content-start" onclick="window.location.href='<?=$url?>'">
                        <img src="<?=$src?>" class="svg" alt="<?=$title?>">
                        <div class="hero_box_content">
                            <h2 class="hero_box_title"><?=$title?></h2>
                            <!--a href="<?=$url?>" class="hero_box_link"><?=__('Read more')?></a-->
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
<?
    }
?>