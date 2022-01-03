<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/"."admin/articlePhrase.php";  
    class getTrip extends artNode{

        private $_xml = null,
                $_url = null,
                $_errors = null,
                $_p = null;
        public function __construct(){
            $this->_p = new artNode();
            $this->_xml = $this->_p->getXml();
            return $this;
        }
       
        public function setUrl($address) {
            $this->_url = $address;
            $this->setAddress($this->_url);
            return $this;
        }
        public function getAll(){
            return $this->getXml();
        }
        public function getResults(){
            if($this->_url != null)
                $this->_p->setAddress($this->_url);
            $ar = $this->_p->getArray(); 
            $records = 0;
            if($ar[1] === 'trips'){
                $ar[count($ar)-1] = substr($ar[count($ar)-1],0,-4);
               
                $country = (isset($ar[2]) ? ucwords(str_replace('-',' ',$ar[2])) : "");
                $state = (isset($ar[3]) ? ucwords(str_replace('-',' ',$ar[3])) : "");
                $city = (isset($ar[4]) ? ucwords(str_replace('-',' ',$ar[4])) : "");

                 /* Old code */

                /*
                    switch(count($ar)){
                        case 1:                                                                                                             // Only country.
                            $records = $this->_xml->xpath("//location/country[text() = '$country']/parent::*");
                        break;
                        case 2:                                                                                                             // City / State, City / Country, State / Country
                            $records = $this->_xml->xpath("//location[country[.= '$country'] and city[text() = '$city']]/country/parent::*");      // country and city.
                            if(count($records) == 0)
                                $records = $this->_xml->xpath("//location[country[.= '$country'] and state[text() = '$state']]/country/parent::*");// country and state.
                            if(count($records) == 0)
                                $records = $this->_xml->xpath("//location[country[.= '$city'] and state[text() = '$state']]/country/parent::*");   // city and state.
                            if(count($records) == 0)
                                $records = $this->_xml->xpath("//location[country[.= '$country'] and city[text() = '$state']]/country/parent::*"); // Country and city city name as state.
                            break;
                        case 3:                                                                                                             // City, State, Country.
                            $records = $this->_xml->xpath("//location[country[.= '$country'] and state[text() = '$state'] and city[text() = '$city']]/country/parent::*");
                            break;
                        default:
                            $records = 0; 
                            break;
                    }
                */

                switch(count($ar)){
                    case 3: // only country
                        if($this->_xml->xpath("//location/country[.= '$country']"))
                            $records = $this->_xml->xpath("//location/place[.= '$country']/parent::*");
                        break;
                    case 4: 
                        if( $this->_xml->xpath("//location[country[.= '$country'] and state[.= '$state']]") || 
                            $this->_xml->xpath("//location[country[.= '$country'] and city[.= '$state']]") || 
                            $this->_xml->xpath("//location[state[.= '$country'] and city[.= '$state']]"))
                            $records = $this->_xml->xpath("//location/place[.= '$state']/parent::*");
                        break;
                    case 5:
                        if($this->_xml->xpath("//location[country[.= '$country'] and state[.= '$state'] and city[.= '$city']]"))
                            $records = $this->_xml->xpath("//location/place[.= '$city']/parent::*");
                        break;
                    default:
                        $records = 0; 
                        break;
                }
               
            }
            if($ar[1] === 'articles')
                $records = $this->_p->getResults();
                
            if($records == 0){
                echo "Invalid Address";die();
            } else return $records; 
        }
    };