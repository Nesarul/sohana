<?php
    class artNode{
        private static $_instance = null;
        private $_xml = null,
                $_php = null,
                $_key = null,
                $_sec = null,
                $_arr = null,
                $_results = null,
                $_errors = null;

        private function __construct($phpFile){
            $this->_arr = explode("/",$phpFile);
            $this->setSection();
            $this->setFile();
            try{
                $this->_xml = simplexml_load_file($this->getFile());
                // $this->_key = $keyword;
                // $this->_php = $phpFile;
            }
            catch (Exception $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
        public static function getInstance($file){
            if(!isset(self::$_instance))
                self::$_instance = new artNode($file);
            return self::$_instance;
        }
        public function getResults(){
            if($this->_php){
                $path = ($this->_sec == 'articles' ? '//dest/link[contains(text()':'//location/link2[contains(text()');
                $this->_results = $this->_xml->xpath("$path, '$this->_php')]/parent::*");
            }
            return $this->_results;
        }
        protected function setSection(){
            if(count($this->_arr) > 2) $this->_sec = $this->_arr[1];
        }
        protected function setFile(){
            if(count($this->_arr) > 2){
                $file = $this->_arr[count($this->_arr)-1];
                $this->_php = substr($file,0,-4);
            }
        }
        protected function getFile(){
            $srv = $_SERVER['DOCUMENT_ROOT'].'/'."admin/assets/".($this->_sec == "articles" ? 'articles.xml':'locations.xml');
            return $srv;
        }

    };