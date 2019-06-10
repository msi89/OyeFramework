<?php

namespace App\Controllers;

use App\Models\User;
use App\Modules\Flash;


class UserController extends Controller {


    public function index(){
      $users = User::get();
      return $this->render('user.index', \compact('users'));
    }
    
    public function register() {
        $user= new User();
        return $this->render('user.register', \compact('user'));
    }
    public function create() {
      $user= new User();
      //$errors =  verifyRequiredParams(array('name','email', 'username'));
      $name = $this->app->request->post('name');
      $email = $this->app->request->post('email');
      $username = $this->app->request->post('username');
      $user = User::create([
        'name' => $name,
        'email' => $email,
        'username' => $username,
      ]);

      if(!$user){     
        $user->name = $name;
        $user->email = $email;
        $user->username = $username;
        $error = 'Impossible de sauvegarder ces donnees';
        return $this->render('user.register', \compact('user','error'));
      }
      Flash::set('success', 'User successfully created!') ;
      return $this->app->redirect('user.login');
    }

    public function auth() {
      $user= new User();
        return $this->render('user.login', \compact('user'));
    }
    public function login() {
      $user= new User();
        return $this->render('user.login', \compact('user'));
    }
}