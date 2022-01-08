<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/"."admin/xmlDecode.php";  
    require_once $_SERVER['DOCUMENT_ROOT']."/"."admin/addDecode.php";  
    class getTrip{
        private $_xml = null,
                $_address = null,
                $_query = null,
                $_errors = null,
                $_p = null;

        public function __construct(){
            $add = new addDecode($_SERVER['REQUEST_URI']);
            $this->_address = $add->getPath();
            $xmlData = new xmlDecode($_SERVER['DOCUMENT_ROOT']."/admin/assets/locations.xml",'location');
            $this->_xml = $xmlData->getResults();
        }
        
    
        public function getResults(){
            $ar = $this->_address;
            $country = (isset($ar[0]) ? ucwords(str_replace('-',' ',$ar[0])) : "");
            $state = (isset($ar[1]) ? ucwords(str_replace('-',' ',$ar[1])) : "");
            $city = (isset($ar[2]) ? ucwords(str_replace('-',' ',$ar[2])) : "");

            $doc = new DOMDocument;

            // We don't want to bother with white spaces
            $doc->preserveWhiteSpace = false;

            $doc->load($_SERVER['DOCUMENT_ROOT']."/admin/assets/locations.xml");

            $pa = new DOMXPath($doc);
        
            switch(count($ar)){
                case 1: // only country
                    if($this->_xml->xpath("//location/country[.= '$country']"))
                        $this->_query = "//countries/location/country[. = '$country']/parent::*";
                    break;
                case 2: 
                    
                    if( $this->_xml->xpath("//location[country[.= '$country'] and state[.= '$state']]") || 
                        $this->_xml->xpath("//location[country[.= '$country'] and city[.= '$state']]") || 
                        $this->_xml->xpath("//location[state[.= '$country'] and city[.= '$state']]"))
                        $records = $this->_xml->xpath("//location/place[.= '$state']/parent::*");
                    break;
                case 3:
                        $this->_query = "//countries/location[country[. = '$country'] and state[.= '$state'] and city[.= '$city']]/parent::*";
                    break;
                default:
                    $records = 0; 
                    break;
            }
            $items = $pa->query($this->_query);
            foreach($items as $key){
                $country = $key->getElementsByTagName('country');
            }
            
            if($ar[1] === 'articles')
                $records = $this->_p->getResults();
                
            if($records == 0){
                echo "Invalid Address";die();
            } else return $records; 
        }
    };