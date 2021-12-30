<?php 
    require_once $_SERVER['DOCUMENT_ROOT']."/"."inc/header.php"; 
    require_once $_SERVER['DOCUMENT_ROOT']."/"."admin/tripsPhrase.php"; 

    $readers = new getTrip();
    $records = $readers->getResults();
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
                               <h2><?php echo $rec->place; ?></h2>
                            </div>
                        </div> 
                        <?php else: ?>
                            <div class="caption-screen mb-1" style="position:initial;">
                                <h2><?php echo $rec->place; ?></h2>
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
                    <h2 class="text-center">We Offer The Following <span style="color:darkblue"><?php echo $rec->place; ?></span> Trips:</h2>
                    <div data-gyg-href="https://widget.getyourguide.com/default/activities.frame" data-gyg-locale-code="en-US" data-gyg-widget="activities" data-gyg-number-of-items="100" data-gyg-partner-id="A3OEZL3" data-gyg-q="<?php echo $rec->place.' '.$rec->search; ?>"></div>
                </div>
                <?php if(!empty($rec->areas)) : ?>
                    <P></P>
                    <div class="col-12">
                        <div class="areas mb-3">
                            <?php echo "<h5>Boating Areas in ".(!empty($rec->city) ? $rec->city.", ":"").(!empty($rec->state) ? $rec->state.", ":"").(!empty($rec->country) ? "<a href='/trips/".strtolower(str_replace(' ','-',$rec->country)).".php' target='_blank'>".$rec->country."</a>":"").":</h5> ".$rec->areas.""; ?>
                        </div>
                    </div>
                <?php 
                    elseif(strpos($rec->criteria,",")): 
                    $addr = explode(',',$rec->criteria);
                    $addr1 = '<a href="/trips'.'/'.strtolower(str_replace(' ','-',trim($addr[count($addr)-1]))).'.php" target=_"blank">'.$addr[count($addr)-1].'</a>';
                    $linkaddr = "";
                    switch(count($addr)){
                        case 2:     // country and state or city;
                            $linkaddr.= $addr[0].', '.$addr1;
                            break;
                        case 3: // country, state and city;
                            $linkaddr.= $addr[0].', '.$addr[1].', '.$addr1;
                            break;
                        default:
                            $linkaddr.= $addr1;
                    }
                ?>
                    
                    <P></P>
                    <div class="col-12">
                        <div class="areas mb-3">
                            <?php echo "<h5>Vacation Spot: ".$linkaddr."<h5>"; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php endforeach; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT']."/"."inc/footer.php" ?>