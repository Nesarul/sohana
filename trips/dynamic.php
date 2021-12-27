<?php 
    require_once $_SERVER['DOCUMENT_ROOT']."/"."inc/header.php"; 
    require_once $_SERVER['DOCUMENT_ROOT']."/"."admin/tripsPhrase.php"; 

    $address = $_GET['url'];
    if(substr($address,-4) != ".php"){
        echo "Invalid Address.";
        die();
    }
   
    $readers = new getTrip($_SERVER['DOCUMENT_ROOT']."/".'/admin/assets/locations.xml');
    $records = $readers->setUrl($address)->getResults();
    foreach($records as $key => $rec):
?>

    <div class="container">
        <div class="row py-1">
            <div class="col-12">
                <div class="card mb-3 w-100">
                    <div class="card-body">
                        <?php
                            $fileName = "../images/".$rec->image.".webp"; 
                            if(file_exists($fileName)):
                        ?>
                        <div class="caption-image">
                            <img src="/images/<?php echo $rec->image; ?>.webp" alt="" class="img-fluid">;
                            <div class="caption-screen">
                                <h2><?php echo $rec->criteria; ?></h2>
                            </div>
                        </div> 
                        <?php else: ?>
                            <div class="caption-screen mb-1" style="position:initial;">
                                <h2><?php echo $rec->criteria; ?></h2>
                            </div>
                        <?php endif;?>
                        <?php 
                            if(count($rec->text) >0 ){
                                foreach($rec->text as $p => $tx){
                                    foreach($tx as $k => $p){
                                        echo $p."<br/><br/>";
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center">We Offer The Following <span style="color:darkblue"><?php echo $rec->criteria; ?></span> Trips:</h2>
                    <div data-gyg-href="https://widget.getyourguide.com/default/activities.frame" data-gyg-locale-code="en-US" data-gyg-widget="activities" data-gyg-number-of-items="100" data-gyg-partner-id="A3OEZL3" data-gyg-q="<?php echo $rec->criteria.' '.$rec->search; ?>"></div>
                </div>
                <?php if(!empty($rec->areas)) : ?>
                    <P></P>
                    <div class="col-12">
                        <div class="areas mb-3">
                            <?php echo "<h5>Boating Areas in ".(!empty($rec->city) ? $rec->city.", ":"").(!empty($rec->state) ? $rec->state.", ":"").(!empty($rec->country) ? $rec->country:"").":</h5> ".$rec->areas.""; ?>
                        </div>
                    </div>
                <?php elseif(strpos($rec->criteria,",")): ?>
                    <P></P>
                    <div class="col-12">
                        <div class="areas mb-3">
                            <?php echo "<h5>Vacation Spot: ".$rec->criteria; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php endforeach; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT']."/"."inc/footer.php" ?>