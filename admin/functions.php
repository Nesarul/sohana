<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/"."admin/tripsPhrase.php";
 
    function getTitle(){
        
        $res['title'] = "Boating Articles";
        $res['desc'] = "Boating";
        
        $r = new getTrip();
        $res = $r->getResults();
        return $res;
    }
    