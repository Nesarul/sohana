<?php
    class getTrip extends artNode{
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
            }
            catch (Exception $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        public static function getInstance($file){
            if(!isset(self::$_instance))
                self::$_instance = artNode::getInstance($file);
            return self::$_instance;
        }
    };