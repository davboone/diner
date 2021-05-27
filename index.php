<?php

//This is my controller for the diner project

//Turn on error-reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

//Require necessary files
require_once ('vendor/autoload.php');
require_once ('/home/dboonegr/config.php');


//start a session AFTER the autoload***
session_start();

//Connect to the database
try{
    //Instantiate a PDO database object
    $dbh = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
    //echo "Connected to the database!";
}
catch (PDOException $e){
    echo $e->getMessage();
    die("Oh darn! We can't connect to the database");
}

//Instantiate classes
$f3 = Base::instance();
$con = new Controller($f3);
$datalayer = new DataLayer($dbh);



//Test my saveOrder method
//$datalayer->saveOrder(new Order("BLT","lunch","mayo"));

//Define default route
$f3->route('GET /', function(){

    //to make an array global
    $GLOBALS['con']->home();
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
    $GLOBALS['con']->order1();
});

$f3->route('GET|POST /order2', function(){
    $GLOBALS['con']->order2();
});

$f3->route('GET /summary', function(){
    $GLOBALS['con']->summary();
});

//Run Fat-Free
$f3->run();