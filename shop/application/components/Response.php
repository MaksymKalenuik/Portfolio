<?php

namespace components;

class Response{

    public function redirect($url) {
        header("location: " . $url);
        exit;
    }
}
