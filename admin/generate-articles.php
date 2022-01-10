<?php
    require_once("./xmlDecode.php");
    
    $xmlData = new xmlDecode($_SERVER['DOCUMENT_ROOT']."/admin/assets/articles.xml",'dest');
    $articles = $xmlData->getResults();
  
    $articleFile = fopen($_SERVER['DOCUMENT_ROOT'].'/sitemap_articles.txt', "w") or die("Unable to open file!");
    $text = "";

    foreach($articles as $art){
        $text .= 'https://yachts.com/articles'.'/'.$art->getElementsByTagName('link')->item(0)->nodeValue.'.php'."\n";
    }
    fwrite($articleFile, $text);
    fclose($articleFile);
   
    header("Location: ./sitemap-builder.php"); 
    exit();