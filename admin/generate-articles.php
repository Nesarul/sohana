<?php
    require_once("./articlePhrase.php");
    $articles = artNode::getInstance("/articles/boat-jokes.php")->getXml();
   
    $xml = new DOMDocument();
    $xml->formatOutput = true;

    $country = null;
    $state =  null;
    $city = null;

    $root = $xml->createElement("sitemap");
    $root = $xml->appendChild($root);

    foreach($articles as $art => $recArt){
        $link = $xml->createElement("link");
        $link = $root->appendChild($link);

        $text = $xml->createTextNode('/articles'.'/'.$recArt->link.'.php');
        $text = $link->appendChild($text);
    }
    
    $xml->save($_SERVER['DOCUMENT_ROOT']."/sitemap_articles.xml");
    header("Location: ./sitemap-builder.php"); 
    exit();