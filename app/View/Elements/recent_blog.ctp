                <div class="sidebar-box bg-light ftco-animate">
                    <h3 class="heading-2"><?=__('Recent products')?></h3>
<?
    foreach($aRecentProducts as $article) {
        $this->ArticleVars->init($article, $url, $title, $teaser, $src, '400x');
?>
                    <div class="block-21 mb-4 d-flex">
                        <a href="<?=$url?>" class="blog-img mr-4" style="background-image: url(<?=$src?>);"></a>
                        <div class="text">
                            <h3 class="heading-1"><a href="<?=$url?>"><?=$title?></a></h3>
                            <div class="meta">
                                <!--div><a href="#"><span class="icon-calendar"></span> Sept. 12, 2019</a></div>
                                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                <div><a href="#"><span class="icon-chat"></span> 19</a></div-->
                            </div>
                        </div>
                    </div>
<?
    }
?>
                </div>