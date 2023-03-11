<?php
//this is my CONTROLLER

//turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);



//Start the session
session_start();
echo "<pre>";
var_dump($_SESSION);
var_dump($_POST);
echo "</pre>";


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

//instantiate a controller class
$con = new Controller($f3);


//Define a default route ('home page' for hello project)
$f3 -> route ('GET / ', function (){
    $GLOBALS['con']->home();

//    $view = new Template();
//    echo $view -> render ('views/home.html');
});

//Define a default route ('personal info' for hello project)


$f3->route('GET|POST /personalInfo', function($f3){
    $GLOBALS['con']->personalInfo();

});


//Define a default route ('experience')

$f3->route('GET|POST /experience', function($f3){

    $f3->set('yearsEx', array("0-2", "2-4", "4+"));
    $f3->set('relocate', array("yes", "no", "maybe"));





    //If the form has been submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $newApp = new Applicant();

        $github= trim($_POST['github']);

        if (Validate::validGithub($github)){
            $newApp->setGithub($github);

//            $_SESSION['email'] = $email;
        }
        else{
            $f3 ->set('errors["github"]',
                'Enter a valid link');
        }



        if (empty($f3 -> get('errors'))) {
            $_SESSION['newApp'] = $newApp;
            $f3->reroute('experience');
        }

        //Move the data from Post array to the SESSION array
        $_SESSION['bio'] = $_POST['bio'];

//        $_SESSION['github'] = $_POST['github'];
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

        $mailString = implode(", ",$_POST['email']);
        $_SESSION['newApp']->setEMail($mailString);

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

