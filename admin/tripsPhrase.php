<?php
    class getTrip extends artNode{

        private $_xml = null,
                $_url = null,
                $_errors = null;
            
        public function __construct($file){
            $this->_xml = parent::getInstance($file)->getXml();
            return $this;
        }
       
        public function setUrl($address) {
            $this->_url = $address;
            return $this;
        }
       
        public function getResults(){
            $add = str_replace('-',' ',substr($this->_url,0,-4));
            $ar = explode('/',$add);
            $city = (isset($ar[2]) ? ucwords($ar[2]) : "");
            $state = (isset($ar[1]) ? ucwords($ar[1]) : "");
            $country = (isset($ar[0]) ? ucwords($ar[0]) : "");
            $records = null;

            // switch(count($ar)){
            //     case 1:                                                                                                             // Only country.
            //         $records = $this->_xml->xpath("//location/country[text() = '$country']/parent::*");
            //     break;
            //     case 2:                                                                                                             // City / State, City / Country, State / Country
            //         $records = $this->_xml->xpath("//location[country[.= '$country'] and city[text() = '$city']]/country/parent::*");      // country and city.
            //         if(count($records) == 0)
            //             $records = $this->_xml->xpath("//location[country[.= '$country'] and state[text() = '$state']]/country/parent::*");// country and state.
            //         if(count($records) == 0)
            //             $records = $this->_xml->xpath("//location[country[.= '$city'] and state[text() = '$state']]/country/parent::*");   // city and state.
            //         if(count($records) == 0)
            //             $records = $this->_xml->xpath("//location[country[.= '$country'] and city[text() = '$state']]/country/parent::*"); // Country and city city name as state.
            //         break;
            //     case 3:                                                                                                             // City, State, Country.
            //         $records = $this->_xml->xpath("//location[country[.= '$country'] and state[text() = '$state'] and city[text() = '$city']]/country/parent::*");
            //         break;
            //     default:
            //         $records = 0; 
            //         break;
            // }

            switch(count($ar)){
                case 1:                                                                                                             // Only country.
                    $records = $this->_xml->xpath("//location/place[text() = '$country']/parent::*");
                break;
                case 2:                                                                                                             // City / State, City / Country, State / Country
                    $records = $this->_xml->xpath("//location/place[text() = '$city']/parent::*");                                  // country and city.
                    if(count($records) == 0)
                        $records = $this->_xml->xpath("//location/place[text() = '$state']/parent::*");                             // country and state.
                    break;
                case 3:                                                                                                             // City, State, Country.
                    $records = $this->_xml->xpath("//location/place[text() = '$city']/parent::*");
                    break;
                default:
                    $records = 0; 
                    break;
            }
            if(count($records) == 0)
                die();
            else return $records; 
        }
    };