<?php

namespace App\Base;

class ApiController {


    protected $app;

    public function __construct() {
      $this->app = \Slim\Slim::getInstance();
    }

    public function callback($statusCode, $response){
        $this->toJson($statusCode, ["error" => false, "data" => $response]);
    }

    public function errorCallback($statusCode, $errorMessage){
        $this->toJson($statusCode, ["error" => true, "message" => $errorMessage]);
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
            parse_str($this->app->request()->getBody(), $request_params);
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
            $response["error"] = true;
            $response["message"] = 'Required field(s) ' . substr($error_fields, 0, -2) . ' is missing or empty';
            $this->toJson(400, $response);
            $this->stop();
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
            parse_str($this->app->request()->getBody(), $request_params);
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
            $response["error"] = true;
            $response["message"] = 'Required field(s) ' . substr($error_fields, 0, -2) . ' is missing';
            $this->toJson(400, $response);
            $this->stop();
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
            $response["error"] = true;
            $response["message"] = 'No files uploaded  for ' . substr($error_fields, 0, -2) . ' param';
            $this->toJson(400, $response);
            $this->stop();
        }
    }

    /**
     * Validating email address
     */
    public function validateEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response["error"] = true;
            $response["message"] = 'Email address is not valid';
            $this->toJson(400, $response);
            $this->stop();
        }
    }

    /**
     * Validating number
     */
    public function validateNumber($number) {
        if (!filter_var($number, FILTER_VALIDATE_INT)) {
            $response["error"] = true;
            $response["message"] = 'Number  is not valid';
            $this->toJson(400, $response);
            $this->stop();
        }
    }

    /**
     * Echoing json response to client
     * @param String $status_code Http response code
     * @param Int $response Json response
     */
    public function toJson($status_code, $response) {
        // Http response code
        $this->app->status($status_code);

        // setting response content type to json
        $this->app->contentType('application/json');

        echo json_encode($response);
    }

    private function stop(){
        $this->app->stop();
    }

}