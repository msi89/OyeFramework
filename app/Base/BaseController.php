<?php

namespace App\Base;

class BaseController {

    protected $viewPath;
    protected $layout;
    
    public function render($view, $datas=[]){
        ob_start();
        
        extract($datas);
       require( $this->viewPath. str_replace('.', '/', $view).'.php');
       $content = ob_get_clean();
       require($this->viewPath.'layout/'.$this->layout.'.php');
    }

    public function __destructor(){

    }

   
}