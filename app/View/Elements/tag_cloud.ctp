                <div class="sidebar-box bg-light ftco-animate">
                    <h3 class="heading-2"><?=__('Tag Cloud')?></h3>
                    <div class="tagcloud">
<?
    foreach($aTags as $id => $title) {
        $url = array('controller' => 'Products', 'action' => 'index', '?' => array('tag_id' => $id));
?>
                        <a href="<?=$this->Html->url($url)?>" class="tag-cloud-link"><?=$title?></a>
<?
    }
?>
                    </div>
                </div>