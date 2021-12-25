<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/"."admin/articlePhrase.php";
 
    function getTitle($pageName){
        
        $res['title'] = "Boating Articles";
        $res['desc'] = "Boating";
        
        $res = artNode::getInstance($pageName)->getResults();
        return $res;
    }
    