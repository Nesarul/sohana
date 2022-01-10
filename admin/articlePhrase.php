<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/admin/xmlDecode.php";  
    require_once $_SERVER['DOCUMENT_ROOT']."/admin/addDecode.php"; 
    class getArticle{
        private $_xml = null,
                $_address = null,
                $_query = null;

        public function __construct(){
            $add = new addDecode($_SERVER['REQUEST_URI']);
            $this->_address = $add->getPath();
            $xmlData = new xmlDecode($_SERVER['DOCUMENT_ROOT']."/admin/assets/articles.xml");
            $this->_xml = $xmlData->getDom();
        }
    
        public function getResults(){
            $ar = $this->_address[count($this->_address)-1];    
            $pa = new DOMXPath($this->_xml);
            $this->_query = $pa->query("//Destination/dest[link[.= '$ar']]");
            return ($this->_query != null ?  $this->_query : null); 
        }
    };