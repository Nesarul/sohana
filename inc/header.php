<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/"."admin/functions.php";  
    $rec = getTitle($_SERVER['REQUEST_URI']);
    $p = explode('/',$_SERVER['REQUEST_URI']);
    $title = null;
    $desc = null;

    if($p[1] == 'articles'){
        $title = $rec[0]->title;
        $desc = $rec[0]->desc;
        $key = $rec[0]->title;
    }elseif($p[1] == 'trips'){
        $title = $rec[0]->place." Yacht Rentals.";
        $desc = "Rent a yacht in ".$rec[0]->place." by the hour or day to spice up your vacation. All ".$rec[0]->place." boat trips, cruises, and charters include a captain.";
        $key = $rec[0]->place;
    }else{
        $title = "Yachts.com";
        $desc = "Yachts.com";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?php echo $title; ?></title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <meta name="description" content="<?php  echo $desc; ?>" />
    <meta name="keywords" content="<?php echo $key; ?>" />

    <!-- Css -->
    <link rel="stylesheet" href="/css/bootstrap.min.css?ver=1.2" type="text/css" media="all">
    <link rel="stylesheet" href="/css/style.css?ver=1" type="text/css" media="all">
    <!-- End of Css -->

    <!-- jQuery -->
    <script src="/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="/js/vendor/bootstrap.bundle.min.js"></script>
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-JP5CNEG66M"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-JP5CNEG66M');
    </script>
    <!-- End of Analytics -->

    
    <!-- GetYourGuide Analytics -->
    <script async defer src="https://widget.getyourguide.com/dist/pa.umd.production.min.js" data-gyg-partner-id="A3OEZL3"></script>

   <script src="/js/main.js"></script>

</head>
<body>
<section id="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-10 col-12 offset-md-2 offset-sm-1" style="z-index: 10;">
                <div class="row">
                    <div class="col-sm-4 col-12 align-items-center d-flex justify-content-center"><a class="navbar-brand" href="https://yachts.com/"><img src="/images/logo.png" class="img-fluid" alt="Logo"></a></div>
                    <div class="col-sm-8 col-12">
                        <div class="input-group"> 
                            <input id="search-box" type="search" class="form-control sb" placeholder="Destination"> 
                            <span class="input-group-addon"><input type="submit" value="Search" class="btn btn-primary"></span> 
                            
                        </div><div id="suggesstion-box" style="max-height: 250px; overflow:auto"></div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</section>