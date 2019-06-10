<?php

require_once 'config.php';
use \Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => HOSTNAME,
    'database'  => DATABASE,
    'username'  => USERNAME,
    'password'  => PASSWORD,
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
$capsule->bootEloquent();