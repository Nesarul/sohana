<?php
    class artNode{
        private $_xml = null,
                $_php = null,
                $_key = null,
                $_sec = null,
                $_arr = null,
                $_results = null,
                $_errors = null;

        protected function __construct(){
            $address = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if(substr($address,-4) != ".php"){
                echo "Invalid Address.";
                die();
            }
            
            $this->_arr = explode("/",$address);
            $this->setSection();
            $this->setFile();
            try{
                $this->_xml = simplexml_load_file($this->getFile());
            }
            catch (Exception $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
            return $this;
        }

        protected function getResults(){
            if($this->_php){
                $path = ($this->_sec == 'articles' ? '//dest/link[contains(text()':'//location/link2[contains(text()');
                $this->_results = $this->_xml->xpath("$path, '$this->_php')]/parent::*");
            }
            return $this->_results;
        }
        private function setSection(){
            if(count($this->_arr) > 2) $this->_sec = $this->_arr[1];
        }
        private function setFile(){
            if(count($this->_arr) > 2){
                $file = $this->_arr[count($this->_arr)-1];
                $this->_php = substr($file,0,-4);
            }
        }
        private function getFile(){
            $srv = $_SERVER['DOCUMENT_ROOT'].'/'."admin/assets/".($this->_sec == "articles" ? 'articles.xml':'locations.xml');
            return $srv;
        }
        protected function getXml(){
            return $this->_xml;
        }
        protected function getArray(){
            return $this->_arr;
        }
        protected function setAddress($address){
            if(substr($address,-4) != ".php"){
                echo "Invalid Address.";
                die();
            }
            
            $this->_arr = explode("/",$address);
            $this->setSection();
            $this->setFile();
            try{
                $this->_xml = simplexml_load_file($this->getFile());
            }
            catch (Exception $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
    };