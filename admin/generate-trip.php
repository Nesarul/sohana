<?php
    require_once("./xmlDecode.php");
    $xmlData = new xmlDecode($_SERVER['DOCUMENT_ROOT']."/admin/assets/locations.xml",'location');
    $trips = $xmlData->getResults();

    $tripsFile = fopen($_SERVER['DOCUMENT_ROOT'].'/sitemap_trips.txt', "w") or die("Unable to open file!");
    $text = "";
    
    $country = null;
    $state =  null;
    $city = null;

    foreach($trips as $trip){
        $con = $trip->getElementsByTagName('country')->item(0)->nodeValue;
        $sta = $trip->getElementsByTagName('state')->item(0)->nodeValue;
        $cit = $trip->getElementsByTagName('city')->item(0)->nodeValue;

        $country = ($con == "" ? "" : strtolower(str_replace(' ','-',$con)).'/');
        $country .= ($sta == "" ? "" : strtolower(str_replace(' ','-',$sta)).'/');
        $country .= ($cit == "" ? "" : strtolower(str_replace(' ','-',$cit)).'/');
        if(substr($country,-1) == '/') $country =  rtrim($country,'/ ');

        $text .= 'https://yachts.com/trips'.'/'.$country.'.php'."\n";
    }

    fwrite($tripsFile, $text);
    fclose($tripsFile);
   
    header("Location: ./sitemap-builder.php"); 
    exit();