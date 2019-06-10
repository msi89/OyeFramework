<?php


$route = new \Slim\Slim();

// wep app routes
$route->get('/', 'App\Controllers\HomeController:index')->name('home');
$route->get('/users', 'App\Controllers\UserController:index')->name('users');
$route->get('/register', 'App\Controllers\UserController:register')->name('user.register');
$route->post('/register', 'App\Controllers\UserController:create')->name('user.create');
$route->get('/login', 'App\Controllers\UserController:login')->name('user.login');
$route->post('/login', 'App\Controllers\UserController:auth')->name('user.auth');







// API group

    // Product group
    $route->group('/api', function () use ($route) {
        // Get all USERS
        $route->get('/users', 'App\Api\Controllers\UserController:index');
        //GET USER BY ID
        $route->get('/users/:id', 'App\Api\Controllers\UserController:get')->conditions(['id' => '[0-9]{1,}']);
        //CREATE USER 
        $route->post('/users', 'App\Api\Controllers\UserController:create');
        //UPDATE USER BY ID
        $route->put('/users/:id', 'App\Api\Controllers\UserController:update')->conditions(['id' => '[0-9]{1,}']);
        //DELETE USER BY ID
        $route->delete('/users/:id', 'App\Api\Controllers\UserController:delete')->conditions(['id' => '[0-9]{1,}']);
    });

$route->run();


