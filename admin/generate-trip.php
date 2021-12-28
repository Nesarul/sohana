<?php
    require_once("./articlePhrase.php");
    $articles = artNode::getInstance("/articles/boat-jokes.php")->getXml();
    $trips = artNode::getInstance("/trips/united-states/alaska.php")->getXml();
    
    $xml = new DOMDocument();
    $xml->formatOutput = true;

    $country = null;
    $state =  null;
    $city = null;

    $root = $xml->createElement("sitemap");
    $root = $xml->appendChild($root);

    foreach($trips as $trip => $rec){
        $link = $xml->createElement("link");
        $link = $root->appendChild($link);

        $country = ($rec->country == "" ? "" : strtolower(str_replace(' ','-',$rec->country)).'/');
        $country .= ($rec->state == "" ? "" : strtolower(str_replace(' ','-',$rec->state)).'/');
        $country .= ($rec->city == "" ? "" : strtolower(str_replace(' ','-',$rec->city)).'/');
        if(substr($country,-1) == '/') $country =  rtrim($country,'/ ');

        $text = $xml->createTextNode('/trips'.'/'.$country.'.php');
        $text = $link->appendChild($text);
    }
    
    $xml->save($_SERVER['DOCUMENT_ROOT']."/sitemap_trips.xml");
    header("Location: ./sitemap-builder.php"); 
    exit();