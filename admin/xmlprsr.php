<?php

class db{
    private static $_instance = null;
    private $_xml = null,
            $_json = null,
            $_results = null;
    private function __construct(){
        try{
            $get = file_get_contents($this->getFileName());
            $this->_xml = simplexml_load_string($get, "SimpleXMLElement", LIBXML_NOCDATA);
            $this->_json = json_encode($this->_xml);
            $this->_results = json_decode($this->_json,TRUE);
        }
        catch (Exception $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public static function getInstance(){
        if(!isset(self::$_instance))
            self::$_instance = new db();
        return self::$_instance;
    }

    public function getResults(){
        return $this->_results;
    }
    protected function getFileName(){
        return $_SERVER['DOCUMENT_ROOT'].'/'."admin/assets/locations.xml";
    }
};