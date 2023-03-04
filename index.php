<?php
//this is my CONTROLLER

//turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);



//Start the session
session_start();
//var_dump($_SESSION);


//require the autoload file
require_once ('vendor/autoload.php');
require_once('model/data-layer.php');
require_once ('model/validate.php');
//require_once ('classes/applicant.php');
//require_once ('classes/Applicant_SubscribedToLists.php');


/*--Testing--*/
//$name1 = new Applicant("Kuma","Pearyoo","kumas@gmail.com",
//"wa","2066014106","www.github.com","years","yes","dlkgfg");
//var_dump($name1);


//create an instance of the Base class
$f3 = Base ::instance();


//Define a default route ('home page' for hello project)
$f3 -> route ('GET / ', function (){

    $view = new Template();
    echo $view -> render ('views/home.html');
});

//Define a default route ('personal info' for hello project)

$f3->route('GET|POST /personalInfo', function($f3){

//    $signUp = new Applicant();


    //If the form has been submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $fName= trim($_POST['fName']);

        if (validFirstName($fName)){
            $_SESSION['fName'] = $fName;
        }
        else{
            $f3 ->set('errors["fName"]',
                'First name must be all alphabet');
        }

        $lName= trim($_POST['lName']);

        if (validLastName($lName)){
            $_SESSION['lName'] = $lName;
        }
        else{
            $f3 ->set('errors["lName"]',
                'Last name must be all alphabet');
        }

        $email= trim($_POST['email']);

        if (validLastName($email)){
            $_SESSION['email'] = $email;
        }
        else{
            $f3 ->set('errors["email"]',
                'Enter a valid email address');
        }


        $phone= trim($_POST['phone']);

        if (validPhone($phone)){
            $_SESSION['phone'] = $phone;
        }
        else{
            $f3 ->set('errors["phone"]',
                'Invalid phone number');
        }





        if (empty($f3 -> get('errors'))) {
            $f3->reroute('experience');
        }

//        $f3->reroute('experience');

    }
    //        $_SESSION['lName'] = $_POST['lName'];
//        $_SESSION['email'] = $_POST['email'];
//        $_SESSION['state'] = $_POST['state'];
//        $_SESSION['phone'] = $_POST['phone'];
    $view = new Template();
    echo $view->render('views/personalInfo.html');
});


//Define a default route ('experience')

$f3->route('GET|POST /experience', function($f3){

    $f3->set('yearsEx', array("0-2", "2-4", "4+"));
    $f3->set('relocate', array("0-2", "2-4", "4+"));





    //If the form has been submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        //Move the data from Post array to the SESSION array
        $_SESSION['bio'] = $_POST['bio'];
        $_SESSION['github'] = $_POST['github'];
        $_SESSION['years'] = $_POST['years'];
        $_SESSION['locate'] = $_POST['locate'];


        //Redirect to summary page
        $f3->reroute('mailing');
    }
    $view = new Template();
    echo $view->render('views/experience.html');
});


//Define a default route ('mailing')

$f3->route('GET|POST /mailing', function($f3){
    $f3->set('mailing1', array("Javascript", "PHP", "Java", "Python"));
    $f3->set('mailing2',array("HTML", "CSS", "Reactjs", "NodeJs"));
    $f3->set('mailing3', array("Saas","Health Tech", "Ag Tech", "Hr Tech"));
    $f3->set('mailing4', array("Industrial Tech", "Cyber Security"));



    //If the form has been submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST'){


        //Move the data from Post array to the SESSION array

        $_SESSION['mail'] = implode(", ",$_POST['mail']);

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

