<?
    if (isset($tags) && $tags) {
?>
                <div class="tag-widget post-tag-container mb-3">
                    <div class="tagcloud">
<?
        foreach($tags as $tag_id) {
            $url = array('controller' => 'Products', 'action' => 'index', '?' => compact('tag_id'));
            $title = $aTags[$tag_id];
?>
                        <a href="<?=$this->Html->url($url)?>" class="tag-cloud-link"><?=$title?></a>
<?
        }
?>
                    </div>
                </div>
<?
    }
?>