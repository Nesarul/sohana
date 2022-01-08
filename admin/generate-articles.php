<?php
    require_once("./xmlDecode.php");
    
    $xmlData = new xmlDecode($_SERVER['DOCUMENT_ROOT']."/admin/assets/articles.xml",'dest');
    $articles = $xmlData->getResults();
  
    $xml = new DOMDocument();
    $xml->formatOutput = true;

    $country = null;
    $state =  null;
    $city = null;

    $root = $xml->createElement("urlset_xmlns");
    $root = $xml->appendChild($root);

    foreach($articles as $art){
        $parent = $xml->createElement("url");
        $parent = $root->appendChild($parent);

        $link = $xml->createElement("loc");
        $link = $parent->appendChild($link);

        $text = $xml->createTextNode('https://yachts.com/articles'.'/'.$art->getElementsByTagName('link')->item(0)->nodeValue.'.php');
        $text = $link->appendChild($text);
    }
    
    $xml->save($_SERVER['DOCUMENT_ROOT']."/sitemap_articles.xml");
    header("Location: ./sitemap-builder.php"); 
    exit();