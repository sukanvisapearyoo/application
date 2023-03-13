<?php
//this is my CONTROLLER

//turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

//require the autoload file
require_once ('vendor/autoload.php');
//Start the session
session_start();
//echo "<pre>";
//var_dump($_SESSION);
//var_dump($_POST);
//echo "</pre>";


//create an instance of the Base class
$f3 = Base ::instance();

//instantiate a controller class
$con = new Controller($f3);

//instantiate a new datalayer class
$dataLayer = new DataLayer();


//Define a default route ('home page' for hello project)
$f3 -> route ('GET / ', function (){
    $GLOBALS['con']->home();

});

//Define a default route ('personal info' for hello project)

$f3->route('GET|POST /personalInfo', function($f3){
    $GLOBALS['con']->personalInfo();

});


//Define a default route ('experience')
$f3->route('GET|POST /experience', function($f3){
    $GLOBALS['con']->experience();

});


//Define a default route ('mailing')
$f3->route('GET|POST /mailing', function($f3){

    if(isset($_SESSION['skip'])){
        $GLOBALS['con']->summary();

    }else{
        $GLOBALS['con']->mailingList();
    }
});


//Define a default route ('sum')
$f3 -> route('GET /sum', function($f3){
    $GLOBALS['con']->summary();

});
$f3 -> route('GET /admin', function($f3){
    $GLOBALS['con']->admin();

});




//run fatfree
$f3 ->run();

