<?php

namespace App\Modules;

class Flash {

    public function __construct(){
        \session_start();
    }

    public static function set($key, $message){
        $_SESSION[$key] = $message;
    }

    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
        return null;
    }


}