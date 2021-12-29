<?php
    require_once("./articlePhrase.php");
    $articles = artNode::getInstance("/articles/boat-jokes.php")->getXml();
   
    $xml = new DOMDocument();
    $xml->formatOutput = true;

    $country = null;
    $state =  null;
    $city = null;

    $root = $xml->createElement("urlset_xmlns");
    $root = $xml->appendChild($root);

    foreach($articles as $art => $recArt){
        $parent = $xml->createElement("url");
        $parent = $root->appendChild($parent);

        $link = $xml->createElement("loc");
        $link = $parent->appendChild($link);

        $text = $xml->createTextNode('https://yachts.com/articles'.'/'.$recArt->link.'.php');
        $text = $link->appendChild($text);
    }
    
    $xml->save($_SERVER['DOCUMENT_ROOT']."/sitemap_articles.xml");
    header("Location: ./sitemap-builder.php"); 
    exit();