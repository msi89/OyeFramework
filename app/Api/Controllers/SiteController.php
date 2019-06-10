<?php

namespace App\Api\Controllers;

use App\Modules\Mail;
use App\Base\ApiController;

class SiteController extends ApiController{
    
    public function sendMail(){
        $this->verifyRequiredParams(['name','email','subject', 'message']);
        $name = $this->app->request->post('name');
        $email = $this->app->request->post('email');
        $subject = $this->app->request->post('subject');
        $message = $this->app->request->post('message');
        $res=  Mail::sendHTML($name, $email, $subject, $message);
        $this->toJson($res['status'], $res);
    }
    
}