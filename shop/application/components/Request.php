<?php

namespace components;

class Request {

    public $postData;
    private $_method;
    
    public function __construct() {
        $this->_setMethod();
        $this->_setPostData();
    }

    /**
     * check request method
     *
     * @param string $method
     * @return bool
     */
    public function checkMethod($method) {
        return $this->_method === $method;
    }

    /**
     * check is isset post value
     * 
     * @param string $value
     * @return bool
     */
    public function isIssetPost($value) {
        return isset($_POST[$value]);
    }

    /**
     * set in property _method name request method
     */
    private function _setMethod() {
        $this->_method = $_SERVER['REQUEST_METHOD'];
    }

    private function _trimData($data) {
        foreach ($data as $key => $field) {
            $data[$key] = trim($data[$key]);
        }
        return $data;
    }

    /**
     * set in property postData trimmed data from POST
     */
    private function _setPostData() {
        $this->postData = $this->_trimData($_POST);
    }

    public function getGetData() {
        return $this->_trimData($_GET);
    }
}