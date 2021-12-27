<?php require_once $_SERVER['DOCUMENT_ROOT']."/"."inc/header.php";  ?>
<style>
    .cp-bg{
        background-color: #0C4160;
        margin-top:0px;
        padding:30px;
        color:white;
        text-align:center;
    }
</style>
<div class="containe-fluid">
    <div class="row">
        <div class="col-12">
            <div class="cp-bg">
                <h2>Yachts.com Vacation Destinations</h2>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <ul class="ul-grid">
                <?php 
                    $xml = simplexml_load_file('./admin/assets/locations.xml');
                    foreach($xml as $key => $rec):
                ?>
                    <li class="my-1">
                        <a href="./trips/<?php echo $rec->link2; ?>.php" target="_blank"><span><?php echo $rec->place; ?></span></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>    
<?php require_once('./inc/footer.php'); ?>