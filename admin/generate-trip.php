<?php
    require_once("./xmlDecode.php");
    $xmlData = new xmlDecode($_SERVER['DOCUMENT_ROOT']."/admin/assets/locations.xml",'location');
    $trips = $xmlData->getResults();

    $xml = new DOMDocument();
    $xml->formatOutput = true;

    $country = null;
    $state =  null;
    $city = null;

    $root = $xml->createElement("urlset_xmlns");
    $root = $xml->appendChild($root);

    foreach($trips as $trip){
        $parent = $xml->createElement("url");
        $parent = $root->appendChild($parent);

        $link = $xml->createElement("loc");
        $link = $parent->appendChild($link);
        
        $con = $trip->getElementsByTagName('country')->item(0)->nodeValue;
        $sta = $trip->getElementsByTagName('state')->item(0)->nodeValue;
        $cit = $trip->getElementsByTagName('city')->item(0)->nodeValue;

        $country = ($con == "" ? "" : strtolower(str_replace(' ','-',$con)).'/');
        $country .= ($sta == "" ? "" : strtolower(str_replace(' ','-',$sta)).'/');
        $country .= ($cit == "" ? "" : strtolower(str_replace(' ','-',$cit)).'/');
        if(substr($country,-1) == '/') $country =  rtrim($country,'/ ');

        $text = $xml->createTextNode('https://yachts.com/trips'.'/'.$country.'.php');
        $text = $link->appendChild($text);
    }
    
    
    $xml->save($_SERVER['DOCUMENT_ROOT']."/sitemap_trips.xml");
    header("Location: ./sitemap-builder.php"); 
    exit();