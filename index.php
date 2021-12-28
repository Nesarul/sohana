<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Yachts.com - Boat Rentals</title>
    <link rel="icon" type="image/x-icon" href="./images/favicon.ico">
    <meta name="description" content="Hourly boat trips, cruises, and yacht rentals in over 5,000 vacation spots worldwide" />
    <meta name="keywords" content="boat rentals, boats, yachts, boating" />

    <!-- Css -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="/css/style.css?ver=1.3" type="text/css" media="all">
    <!-- End of Css -->

    <!-- jQuery -->
    <script src="/js/vendor/jquery-3.6.0.min.js"></script>

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-JP5CNEG66M"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-JP5CNEG66M');
    </script>
    <!-- End of Analytics -->

</head>
<body>
    <section id="sec-top" class="d-flex position-relative align-items-center justify-content-center flex-column">
        <video playsinline autoplay muted loop>
            <source src="./videos/slider2.mp4" type="video/mp4" />
        </video>
        <p class="caption text-center">Boats For Rent <span>Over 5,000 Tours, Cruises, and Charters</span></p>
        <?php
            $ii = 0;
            if (isset($_REQUEST['city']) && !empty($_REQUEST['city'])) {
                $ii++;
                echo "<h1>City - " . $_REQUEST['city'] . "</h1>";
            }
            if (isset($_REQUEST['state']) && !empty($_REQUEST['state'])) {
                $ii++;
                echo "<h1>State - " . $_REQUEST['state'] . "</h1>";
            }
            if (isset($_REQUEST['country']) && !empty($_REQUEST['country'])) {
                $ii++;
                echo "<h1>Country - " . $_REQUEST['country'] . "</h1>";
            }
            if ($ii == 0):
        ?>
        <div class="col-md-4 col-sm-6 col-12" style="z-index: 10;">
            <div class="input-group"> 
                <input id="search-box" type="search" class="form-control sb" placeholder="Enter Destination Name"> 
                <span class="input-group-addon"><input type="submit" value="Search" class="btn btn-primary"></span> 
                
            </div><div id="suggesstion-box" style="max-height: 250px; overflow:auto"></div>
        </div>

        <?php endif; ?>


        <p class="search-text text-center"><span>Hourly or Full Day Rentals, Captain Included</span></p>

    </section>


    <div class="container">
        <div class="row py-5">
            <div class="col-12 text-center mb-2">
                <div id="yacht-destinations" class="sec-title">Featured Destinations</div>
            </div>
        </div>
        <div class="row pb-5" id="destination">
            <?php
                $dest_data = simplexml_load_file("./admin/assets/destination.xml") or die("Failed to load");
                   foreach($dest_data->dest as $key => $rec):
            ?>
            
                <div class="col-sm-6 col-md-4 mb-4">
                    <a class="link-dest" href="/trips/<?php echo $rec->link; ?>.php" target="_blank">
                        <div class="card w-100 pb-3"><img src="./images/thumbnail/<?php echo $rec->image; ?>" class="img-fluid" alt="<?php echo $rec->title; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $rec->title; ?></h5>
                                <p class="card-text"><?php echo $rec->desc; ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>

            <div class="col-12 text-center">
                <a href="./destinations.php" target="_blank">Click Here</a> for a list of all of our 400 yachting destinations.
            </div>
        </div>
    </div>
    <script src="./js/main.js"></script>
    <?php require_once('./inc/footer.php'); ?>