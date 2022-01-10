<?php
    class xmlDecode{
        private $_dom,
                $_error,
                $_tagName;
        public function __construct($fileName = null, $tag=null){
            $this->_tagName = $tag;
            $this->_dom = new DOMDocument();
            $this->_dom->load($fileName);

            // We don't want to bother with white spaces
            $this->_dom->preserveWhiteSpace = false;
        }
        public function getResults(){
            return $this->_dom->getElementsByTagName($this->_tagName);
        }
        public function getDom(){
            return $this->_dom;
        }
    }