<!-- section start -->
<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ftco-animate">
<? 
    $title = $article['Page']['title'];
    echo $this->element('title', compact('title'));
    echo $this->ArticleVars->body($article);
    if (Hash::get($article, 'Media.id')) {
?>
                <p>
                    <img src="<?=$this->Media->imageUrl($article, '1200x')?>" alt="<?=$title?>" class="img-fluid">
                </p>
<?
    }
?>
            </div> <!-- .col-md-8 -->

            <div class="col-lg-4 sidebar ftco-animate">

<?
    echo $this->element('categories');
    echo $this->element('tag_cloud');
    echo $this->element('recent_blog');
    
    
    // echo $this->element('text_block', $aCategories[$cat_id]['Category']);
?>
            </div>

        </div>
    </div>
</section>
<!-- section end -->