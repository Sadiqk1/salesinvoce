<?php
//ini_set('display_errors', 1);
//include ('header.php');
require 'vendor/autoload.php';
require_once "Controller/router.php";

route('/', function () {
    require '' ;
});

route('/about', function () {
    require 'view/about.php' ;
});

route('/add', function () {
    require 'view/addNew.php' ;
});

$action = $_SERVER['REQUEST_URI'];
dispatch($action);
//routing file ,works when integerate with index


