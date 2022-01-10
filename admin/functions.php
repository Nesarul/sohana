<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/"."admin/tripsPhrase.php";
 
    function getTitle($term){
        
        $res['title'] = "Boating Articles";
        $res['desc'] = "Boating";
        $r = ($term == "trips" ? new getTrip() : new getArticle());
        $res = $r->getResults();
        return $res;
    }
    