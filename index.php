<?php
//this is my CONTROLLER for the hello project

//turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

//require the autoload file
require_once ('vendor/autoload.php');

//create an instance of the Base class
$f3 = Base ::instance();


//Define a default route ('home page' for hello project)
$f3 -> route ('GET / ', function (){

    $view = new Template();
    echo $view -> render ('views/home.html');
});

//Define a default route ('personal info' for hello project)
$f3 -> route ('GET /personalInfo', function (){

    $view = new Template();
    echo $view -> render ('views/personalInfo.html');
});

//Define a default route ('experience')
$f3 -> route ('GET /experience', function (){

    $view = new Template();
    echo $view -> render ('views/experience.html');
});

//Define a default route ('mailing')
$f3 -> route ('GET /mailing', function (){

    $view = new Template();
    echo $view -> render ('views/mailingList.html');
});

//Define a default route ('sum')
$f3 -> route ('GET /sum', function (){

    $view = new Template();
    echo $view -> render ('views/summary.html');
});



//run fatfree
$f3 ->run();

