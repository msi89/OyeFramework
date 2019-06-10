<?php

namespace App\Controllers;

use App\Base\BaseController;



class Controller  extends BaseController {

    protected $layout ='default';
    protected $title="Welcome!";
    public $app;

    public function __construct(){
      $this->app = \Slim\Slim::getInstance();
      $this->viewPath  =  __DIR__.'/../Views/';
    }


        /**
     * Verifying required params posted or not
     */
    public function verifyRequiredParams($required_fields) {
        $error = false;
        $error_fields = "";
        $request_params = array();
        $request_params = $_REQUEST;
        // Handling PUT request params
        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            $app = \Slim\Slim::getInstance();
            parse_str($app->request()->getBody(), $request_params);
        }
        foreach ($required_fields as $field) {
            if (!isset($request_params[$field]) || strlen(trim($request_params[$field])) <= 0) {
                $error = true;
                $error_fields .= $field . ', ';
            }
        }

        if ($error) {
            // Required field(s) are missing or empty
            // echo error json and stop the app
            $response = array();
            $app = \Slim\Slim::getInstance();
            $response["error"] = true;
            $response["message"] = 'Required field(s) ' . substr($error_fields, 0, -2) . ' is missing or empty';
            $app->stop();
            return $response;
        }
    }
    /**
     * Verifying params posted or not
     */
    public function verifyParams($fields) {
        $error = false;
        $error_fields = "";
        $request_params = array();
        $request_params = $_REQUEST;
        // Handling PUT request params
        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            $app = \Slim\Slim::getInstance();
            parse_str($app->request()->getBody(), $request_params);
        }
        foreach ($fields as $field) {
            if (!isset($request_params[$field])) {
                $error = true;
                $error_fields .= $field . ', ';
            }
        }

        if ($error) {
            // Required field(s) are missing or empty
            // echo error json and stop the app
            $response = array();
            $app = \Slim\Slim::getInstance();
            $response["error"] = true;
            $response["message"] = 'Required field(s) ' . substr($error_fields, 0, -2) . ' is missing';
            $app->stop();
            return $response;
        }
    }
    /**
     * Verifying required params posted or not
     */
    public function verifyUploadedFileParams($required_fields) {
        $error = false;
        $error_fields = "";
        $request_params = array();
        $request_params = $_REQUEST;
        // Handling PUT request params
    
        foreach ($required_fields as $field) {
            if (!isset($_FILES[$field])) {
                $error = true;
                $error_fields .= $field . ', ';
            }
        }

        if ($error) {
            // Required field(s) are missing or empty
            // echo error json and stop the app
            $response = array();
            $app = \Slim\Slim::getInstance();
            $response["error"] = true;
            $response["message"] = 'No files uploaded  for ' . substr($error_fields, 0, -2) . ' param';
            $app->stop();
            return $response;
        }
    }

    /**
     * Validating email address
     */
    public function validateEmail($email) {
        $app = \Slim\Slim::getInstance();
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response["error"] = true;
            $response["message"] = 'Email address is not valid';
            $app->stop();
            return $response;
        }
    }

    /**
     * Validating number
     */
    public function validateNumber($number) {
        $app = \Slim\Slim::getInstance();
        if (!filter_var($number, FILTER_VALIDATE_INT)) {
            $response["error"] = true;
            $response["message"] = 'Number  is not valid';
            $app->stop();
            return $response;
        }
    }


}