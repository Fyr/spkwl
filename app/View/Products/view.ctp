<?
    $cat_id = $article['Product']['cat_id'];
    $category = $aCategories[$cat_id];
?>
<!-- section start -->
<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ftco-animate heading-section">
                <div class="subheading"><?=$category['Category']['title']?></div>
<? 
    $title = $article['Product']['title'];
    echo $this->element('title', compact('title'));
    echo $this->ArticleVars->body($article);
    echo $this->element('tags');
?>
                <p>
                    <img src="<?=$this->Media->imageUrl($article, '1200x')?>" alt="<?=$title?>" class="img-fluid">
                </p>
<?/*
                <div class="about-author d-flex p-4 bg-light">
                    <div class="bio mr-5">
                        <img src="/img/tmp/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
                    </div>
                    <div class="desc">
                        <h3>George Washington</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
                    </div>
                </div>
*/?>
            </div> <!-- .col-md-8 -->

            <div class="col-lg-4 sidebar ftco-animate">

<?
    echo $this->element('categories', array('active' => $cat_id));
    echo $this->element('text_block', $category['Category']);
    echo $this->element('tag_cloud');
?>
            </div>

        </div>
    </div>
</section>
<!-- section end -->