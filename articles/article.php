<?php 
    require_once($_SERVER['DOCUMENT_ROOT'].'/inc/header.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/admin/articlePhrase.php');
    
    $art = new getArticle();
    $articles = $art->getResults();
?>
<div class="container">
    <div class="row py-5">
        <div class="col-12">
            <div class="card mb-3 w-100">
                <div class="card-body">
                    <div class="caption-image" <?php if($articles[0]->getElementsByTagName('image')->item(0)->nodeValue == "none")echo 'style="padding-top:85px";'?>>
                        <?php if($articles[0]->getElementsByTagName('image')->item(0)->nodeValue != "none") : ?>
                            <img src="/images/pages/<?php echo $articles[0]->getElementsByTagName('image')->item(0)->nodeValue; ?>.webp" alt="<?php echo $articles[0]->getElementsByTagName('image')->item(0)->nodeValue; ?>" class="img-fluid w-100 mb-3"> 
                        <?php endif; ?>
                        <div class="caption-screen">
                            <h2><?php echo $articles[0]->getElementsByTagName('title')->item(0)->nodeValue; ?></h2>
                        </div>
                    </div>
                    <?php 
                        $i = $articles[0]->getElementsByTagName('text')->item(0)->childElementCount;
                        if($i > 0)
                            for($j = 0; $j < $i ; $j++)
                                echo $articles[0]->getElementsByTagName('text')->item(0)->getElementsByTagName('p')->item($j)->nodeValue;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/inc/footer.php'); ?>