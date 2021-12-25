<?php 
    require_once $_SERVER['DOCUMENT_ROOT']."/"."inc/header.php"; 
    $xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT']."/".'/admin/assets/locations.xml');

    $address = $_GET['url'];
    if(substr($address,-4) != ".php"){
        echo "Invalid Address.";
        die();
    }
        
    $add = substr($address,0,-4);


    $ar = explode('/',$add);
    $city = "";
    $state = "";
    $country = "";
    $place = "";

    if(count($ar) > 0){
        $rv = $ar[count($ar)-1];
        $rv2 = str_replace("-", " ", $rv);
        $place = ucwords($rv2);
    }else if(isset($_POST['city']) | isset($_POST['state']) | isset($_POST['country']) | $place != ""){
        if(isset($_POST['city'])) $city = $_POST['city'];
        if(isset($_POST['state'])) $state = $_POST['state'];
        if(isset($_POST['country'])) $country = $_POST['country'];
    } else die;


    // $xml = simplexml_load_file('./admin/assets/locations.xml');
    if($city)
        $records = $xml->xpath("//location/city[contains(text(), '$city')]/parent::*");
    else if($state) 
        $records = $xml->xpath("//location/state[contains(text(), '$state')]/parent::*");
    else if($country)
        $records = $xml->xpath("//location/country[contains(text(), '$country')]/parent::*");  
    else
        $records = $xml->xpath("//location/place[contains(text(), '$place')]/parent::*");  
    if($records[0]->place != $place)
        die();    
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
                                <h2 id="ttt"><?php echo $place; ?></h2>
                            </div>
                        </div> 
                        <?php else: ?>
                            <div class="caption-screen mb-1" style="position:initial;">
                                <h2><?php echo $place; ?></h2>
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
                    <h2 class="text-center">We Offer The Following <span style="color:darkblue"><?php echo $place; ?></span> Trips:</h2>
                    <div data-gyg-href="https://widget.getyourguide.com/default/activities.frame" data-gyg-locale-code="en-US" data-gyg-widget="activities" data-gyg-number-of-items="100" data-gyg-partner-id="A3OEZL3" data-gyg-q="<?php echo $place.' '.$rec->search; ?>"></div>
                </div>

                <div class="col-12">
                    <div class="areas mb-3">
                        <?php if(!empty($rec->areas)) echo "<h5>Boating Areas in ".(!empty($rec->city) ? $rec->city.", ":"").(!empty($rec->state) ? $rec->state.", ":"").(!empty($rec->country) ? $rec->country:"")."</h5> ".$rec->areas."<hr>"; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php endforeach; ?>


    

<?php require_once $_SERVER['DOCUMENT_ROOT']."/"."inc/footer.php" ?>