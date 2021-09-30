                <div class="sidebar-box bg-light ftco-animate">
                    <h3 class="heading-2"><?=__('Categories')?></h3>
                    <ul class="categories">
<?
    foreach($aCategories as $id => $article) {
        $this->ArticleVars->init($article, $url, $title);
        $class = (isset($active) && $active == $id) ? 'active' : '';
        $count = (isset($article[0]) && isset($article[0]['count'])) ? "({$article[0]['count']})" : '';
?>
                        <li class="<?=$class?>"><a href="<?=$url?>"><?=$title?> <span><?=$count?></span></a></li>

<?
    }
?>
                    </ul>
                </div>
