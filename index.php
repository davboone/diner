<?php

//start session
session_start();

//This is my controller for the diner project

//Turn on error-reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

//Require autoload file
require_once ('vendor/autoload.php');

//Instantiate Fat-Free
$f3 = Base::instance();

//Define default route
$f3->route('GET /', function(){

    //Display the home page
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET /breakfast', function(){

    //Display the home page
    $view = new Template();
    echo $view->render('views/breakfast.html');
});

$f3->route('GET /lunch', function(){

    //Display the home page
    $view = new Template();
    echo $view->render('views/lunch.html');
});

$f3->route('GET|POST /order1', function(){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_SESSION['food'] = $_POST['food'];
        $_SESSION['meal'] = $_POST['meal'];
        header('location: order2');
    }

    //Display the home page
    $view = new Template();
    echo $view->render('views/Orderform1.html');
});

$f3->route('GET|POST /order2', function(){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Data validation will go here

        $_SESSION['conds'] = implode(", ",$_POST['conds']);
        header('location: summary');
    }

    //Display the home page
    $view = new Template();
    echo $view->render('views/Orderform2.html');
});

$f3->route('GET /summary', function(){

    //Display the home page
    $view = new Template();
    echo $view->render('views/summary.html');
});

//Run Fat-Free
$f3->run();