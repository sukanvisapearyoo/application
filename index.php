<?php
//this is my CONTROLLER for the hello project

//turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);


//require the autoload file
require_once ('vendor/autoload.php');


//Start the session
session_start();
//var_dump($_SESSION);




//create an instance of the Base class
$f3 = Base ::instance();


//Define a default route ('home page' for hello project)
$f3 -> route ('GET / ', function (){

    $view = new Template();
    echo $view -> render ('views/home.html');
});

//Define a default route ('personal info' for hello project)

$f3->route('GET|POST /personalInfo', function($f3){
    //If the form has been submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        //Move the data from Post array to the SESSION array
        $_SESSION['fName'] = $_POST['fName'];
        $_SESSION['lName'] = $_POST['lName'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['state'] = $_POST['state'];
        $_SESSION['phone'] = $_POST['phone'];

        //Redirect to summary page
        $f3->reroute('experience');
    }
    $view = new Template();
    echo $view->render('views/personalInfo.html');
});


//Define a default route ('experience')

$f3->route('GET|POST /experience', function($f3){
    //If the form has been submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        //Move the data from Post array to the SESSION array
        $_SESSION['bio'] = $_POST['bio'];
        $_SESSION['github'] = $_POST['github'];
        $_SESSION['radio-yr'] = $_POST['radio-yr'];
        $_SESSION['radio-relocate'] = $_POST['radio-relocate'];


        //Redirect to summary page
        $f3->reroute('mailing');
    }
    $view = new Template();
    echo $view->render('views/experience.html');
});


//Define a default route ('mailing')

$f3->route('GET|POST /mailing', function($f3){
    //If the form has been submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        //Move the data from Post array to the SESSION array
        $_SESSION['mail[]'] = $_POST['mail'];

        //Redirect to summary page
        $f3->reroute('sum');
    }
    $view = new Template();
    echo $view->render('views/mailingList.html');
});


//Define a default route ('sum')
$f3 -> route ('GET /sum', function (){

    $view = new Template();
    echo $view -> render ('views/summary.html');
});



//run fatfree
$f3 ->run();

