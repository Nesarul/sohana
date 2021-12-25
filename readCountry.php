<?php
    $base_url ='/trips';

    $key = ucwords(strtolower($_REQUEST['keyword']));
    $xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/'."admin/assets/locations.xml");
   
    $array = array();
    echo '<ul id="country-list">';

    $results = $xml->xpath("//location/city[contains(text(), '$key')]/parent::*");
    if(empty($results)){
        $results = $xml->xpath("//location/state[contains(text(), '$key')]/parent::*");
        if(empty($results)){
            $results = $xml->xpath("//location/country[contains(text(), '$key')]/parent::*");
        }
    }


    foreach($results as $key => $data){
        $city = $data->city;
        $state = $data->state;
        $country = $data->country;

        $url = null;
        $urlDisplay = null;
        
        $url .= (empty(trim($country)) ? "":trim($country).'/');
        $url .= (empty(trim($state)) ? "":trim($state).'/');
        $url .= (empty(trim($city)) ? "":trim($city));
        if(substr($url,-1) == '/') $url =  rtrim($url,'/ ');        // remove trailing slash (/).

        $urlDisplay .= (empty(trim($city)) ? "":trim($city).', ');
        $urlDisplay .= (empty(trim($state)) ? "":trim($state).', ');
        $urlDisplay .= (empty(trim($country)) ? "":trim($country));
        if(substr($url,-1) == ',') $url =  rtrim($url,', ');        // remove trailing comma (,).

        if (strpos(strtolower($data->country.', '.$data->state.', '.$data->city), strtolower(trim($_REQUEST['keyword']))) !== false) {
            $array[] = '<li><form method="post" action="' .$base_url.'/'.strtolower(str_replace(' ','-',$url)). '.php"><input class="crite" type="submit" name="submit" value="'.$urlDisplay.'" /></form></li>';
        }
    }
    $array = array_unique($array);
    echo implode("", $array);
    echo '</ul>';