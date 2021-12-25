<?php require_once $_SERVER['DOCUMENT_ROOT']."/"."inc/header.php";  ?>
    <script>
        $("title").html("Yachts.com - Boating Articles");
        $("meta[name='description']").attr("content", "Learn about boats, yacht charters, yacht vacations, and cruises.");
        $("meta[name='keywords']").attr("content", "boat rentals tips, boat vacations, yachts, travel boating articles");
    </script>
    <div class="container">
        <div class="row py-5">
            <div class="col-12 text-center mb-2">
                <div class="sec-title">Boating Articles</div>
            </div>
        </div>
        <div class="row pb-5" id="destination">
            <?php
                $dest_data = simplexml_load_file("./admin/assets/articles.xml") or die("Failed to load");
                   foreach($dest_data->dest as $key => $rec):
            ?>
            
                <div class="col-sm-6 col-md-4 mb-4">
                    <a class="link-dest" href="/articles/<?php echo $rec->link; ?>.php" target="_blank">
                        <div class="card w-100 pb-3">
                            <div class="img-box">
                                <img src="./images/thumbnail/<?php echo $rec->thumb; ?>.webp" class="img-fluid" alt="<?php echo $rec->title; ?>">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $rec->title; ?></h5>
                                <p class="card-text"><?php echo $rec->desc; ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php require_once $_SERVER['DOCUMENT_ROOT']."/"."inc/footer.php"; ?>