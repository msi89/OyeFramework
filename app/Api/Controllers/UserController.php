<?php

namespace App\Api\Controllers;

use App\Models\User;
use App\Base\ApiController;

class UserController extends ApiController{
    

  /**
   * 
   */
  public function index(){
      $products = User::get();
      $this->toJson(200,$products);
  }

  /**
   * 
   */
  public function get($id){
    $product = User::where('id', $id)->get();
    $this->toJson(200, $product);
  }

  

  /**
   * 
   */
  public function create(){
    $this->toJson(201, "user created");
  }

  /**
   * 
   */
  public function update($id){
    $this->toJson(201, "user updated");
  }

  /**
   * 
   */
  public function delete($id){
    $this->toJson(201, "user deleted");
  }


    
}