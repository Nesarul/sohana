<?php 
    require_once $_SERVER['DOCUMENT_ROOT']."/"."inc/header.php"; 
    require_once $_SERVER['DOCUMENT_ROOT']."/"."admin/tripsPhrase.php"; 

    $readers = new getTrip();
    $records = $readers->getResults();
    foreach($records as $key):
?>

    <div class="container">
        <div class="row py-1">
            <div class="col-12">
                <div class="card mb-3 w-100">
                    <div class="card-body">
                        <?php
                            $fileName = "../images/".$key->getElementsByTagName('image')->item(0)->nodeValue.".webp"; 
                            if(file_exists($fileName)):
                        ?>
                        <div class="caption-image">
                            <img src="/images/<?php echo $key->getElementsByTagName('image')->item(0)->nodeValue; ?>.webp" alt="" class="img-fluid">;
                            <div class="caption-screen">
                               <h2><?php echo $key->getElementsByTagName('place')->item(0)->nodeValue;?></h2>
                            </div>
                        </div> 
                        <?php else: ?>
                            <div class="caption-screen mb-1" style="position:initial;">
                                <h2><?php echo $key->getElementsByTagName('place')->item(0)->nodeValue; ?></h2>
                            </div>
                        <?php endif;?>
                        <?php 
                            $i = $key->getElementsByTagName('text')->item(0)->childElementCount;
                            if($i > 0){
                                for($j = 0; $j < $i ; $j++): ?>
                                   <p><?php echo $key->getElementsByTagName('text')->item(0)->getElementsByTagName('p')->item($j)->nodeValue; ?></p>
                                <?php endfor; 
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
                    <?php if($key->getElementsByTagName('showViator')->item(0)->nodeValue == '1' || $key->getElementsByTagName('showGetYourGuide')->item(0)->nodeValue == '1' ) : ?>
                        <h2 class="text-center">We Offer The Following <span style="color:darkblue"><?php echo $key->getElementsByTagName('place')->item(0)->nodeValue; ?></span> Trips:</h2>
                    <?php endif; if($key->getElementsByTagName('showViator')->item(0)->nodeValue == '1'): ?>
                        <div data-vi-partner-id=P00057657 data-vi-language=en data-vi-currency=USD data-vi-partner-type="AFFILIATE" data-vi-url="<?php echo $key->getElementsByTagName('ViatorURL')->item(0)->nodeValue; ?>"  data-vi-total-products=25 data-vi-campaign="Yachts.com"></div>
                        <script async src="https://www.viator.com/orion/partner/widget.js"></script>
                    <?php endif; if($key->getElementsByTagName('showGetYourGuide')->item(0)->nodeValue == '1'): ?>
                        <div data-gyg-href="https://widget.getyourguide.com/default/activities.frame" data-gyg-locale-code="en-US" data-gyg-widget="activities" data-gyg-number-of-items="100" data-gyg-cmp="Yachts.com" data-gyg-partner-id="A3OEZL3" data-gyg-q="<?php echo $key->getElementsByTagName('place')->item(0)->nodeValue.' '.$key->getElementsByTagName('search')->item(0)->nodeValue;; ?>"></div>
                    <?php endif; ?>
                </div>
                <?php if(!empty($key->getElementsByTagName('areas')->item(0)->nodeValue)) : ?>
                    <P></P>
                    <div class="col-12">
                        <div class="areas mb-3">
                            <?php echo "<h5>Boating Areas in ".(!empty($key->getElementsByTagName('city')->item(0)->nodeValue) ? $key->getElementsByTagName('city')->item(0)->nodeValue.", ":"").(!empty($key->getElementsByTagName('state')->item(0)->nodeValue) ? $key->getElementsByTagName('state')->item(0)->nodeValue.", ":"").($key->getElementsByTagName('country')->length > 0 ? "<a href='/trips/".strtolower(str_replace(' ','-',$key->getElementsByTagName('country')->item(0)->nodeValue)).".php' target='_blank'>".$key->getElementsByTagName('country')->item(0)->nodeValue."</a>":"").":</h5> ".$key->getElementsByTagName('areas')->item(0)->nodeValue.""; ?>
                        </div>
                    </div>
                <?php 
                    elseif(strpos($key->getElementsByTagName('criteria')->item(0)->nodeValue,",")): 
                    $addr = explode(',',$key->getElementsByTagName('criteria')->item(0)->nodeValue);
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