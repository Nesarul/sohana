<?php require_once($_SERVER['DOCUMENT_ROOT']."/".'/inc/header.php');
    $address = $_GET['url'];
    if(substr($address,-4) != ".php"){
        echo "Invalid Address.";
        die();
    }
        
    $add = substr($address,0,-4);
    $ar = explode('/',$add);
    $link = $ar[0];
    $xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT']."/".'/admin/assets/articles.xml');
    $records = $xml->xpath("//dest/link[contains(text(), '$link')]/parent::*");  
?>
<div class="container">
    <div class="row py-5">
        <div class="col-12">
            <div class="card mb-3 w-100">
                <div class="card-body">
                    <div class="caption-image" <?php if($records[0]->image == "none")echo 'style="padding-top:85px";'?>>
                        <?php if($records[0]->image != "none") : ?>
                            <img src="/images/pages/<?php echo $records[0]->image; ?>.webp" alt="<?php echo $records[0]->image; ?>" class="img-fluid w-100 mb-3"> 
                        <?php endif; ?>
                        <div class="caption-screen">
                            <h2 id="ttt"><?php echo $records[0]->title; ?></h2>
                        </div>
                    </div>
                    <?php 
                        foreach($records[0]->text as $p => $tx){
                            foreach($tx as $k => $p){
                                echo $p;
                            }
                        }
                    ?>

                </div>
            </div>

            
        </div>
    </div>
</div>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/".'/inc/footer.php'); ?>