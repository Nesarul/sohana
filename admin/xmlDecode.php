<?php
    class xmlDecode{
        private $_results,
                $_error,
                $_tagName,
                $_fileName;
        public function __construct($fileName = null, $tag){
            $this->_fileName = ($fileName != null ? $fileName : null);
            $this->_tagName = $tag;
        }
        public function getResults(){
            $dom = new DOMDocument();
            $dom->load($this->_fileName);
            return $dom->getElementsByTagName($this->_tagName);
        }
    }