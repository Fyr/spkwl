<?
    $class = 'bg-light';
?>
<!-- section start -->
<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ftco-animate">
                <div class="row">
<?
    $cat_id = (isset($filter['Product.cat_id'])) ? $filter['Product.cat_id'] : null;
    if ($cat_id) {
        echo $this->element('title', array('title' => Hash::get($aCategories, "{$cat_id}.Category.title")));
        echo $this->Html->tag('p', Hash::get($aCategories, "{$cat_id}.Category.teaser"));
    }
    foreach($aProducts as $article) {
        $this->ArticleVars->init($article, $url, $title, $teaser, $src, 'thumb400x400', $id);
        $category = $aCategories[$article['Product']['cat_id']];
        $cat_url = $this->Html->url(SiteRouter::url($category));
        $cat_title = $category['Category']['title'];
?>
                    <div class="col-md-12 d-flex ftco-animate">
                        <div class="blog-entry align-self-stretch d-md-flex">
                            <a href="<?=$url?>" class="block-20" style="background-image: url('<?=$src?>');"></a>
                            <div class="text d-block pl-md-4 heading-section">
                                <div class="meta mb-3">
<?/*?>
                                    <div><a href="<?=$this->Html->url(SiteRouter::url($category))?>"><?=$category['Category']['title']?></a></div>

                                    <div><a href="#">Admin</a></div>
                                    <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
<?*/?>
                                </div>
                                <div class="subheading"><a href="<?=$cat_url?>"><span class="ionicons ion-ios-arrow-forward"></span> <?=$cat_title?></a></div>
                                <h3 class="heading"><a href="<?=$url?>"><?=$title?></a></h3>
                                <p><?=$teaser?></p>
                                <?=$this->element('tags', (isset($aProductTags[$id])) ? array('tags' => $aProductTags[$id]) : null)?>
                                <p><?=$this->element('more', compact('url'))?></p>
                            </div>
                        </div>
                    </div>
<?
    }
?>
                </div>
                <div class="row mt-5">
                    <div class="col">
                        <div class="block-27 paging">
                            <?=$this->element('paginate')?>
                        </div>
                    </div>
                </div>
            </div> <!-- .col-md-8 -->

            <div class="col-lg-4 sidebar ftco-animate">
<?
    echo $this->element('categories', array('active' => $cat_id));
    echo $this->element('tag_cloud');
    if ($cat_id) {
        echo $this->element('text_block', $aCategories[$cat_id]['Category']);
    }
    
?>
            </div>

        </div>
    </div>
</section>
<!-- section end -->