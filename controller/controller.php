<?php
class Controller
{
    private $_f3;

    /**
     * this function instantiates the controller class, with a fatfree object
     * @param $f3
     */
    function __construct($f3)

    {
        $this->_f3 = $f3;
    }

    function home()
    {
        $view = new Template();
        echo $view -> render('views/home.html');
    }

    function personalInfo()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $signup= $_POST['signup'];

            if(Validate::validSignMeUp($signup))
            {
                $newApp = new Applicant_SubscribedToLists();
            }else
            {
                $newApp = new Applicant();
            }
            //validation firstname
            $fName = trim($_POST['fName']);

            if (Validate::validFirstName($fName)) {
                $newApp->setFName($fName);

//            $_SESSION['fName'] = $fName;
            } else {
                $this->_f3->set('errors["fName"]',
                    'First name must be all alphabet');
            }

            $lName = trim($_POST['lName']);

            if (Validate::validLastName($lName)) {
                $newApp->setLName($lName);

//            $_SESSION['lName'] = $lName;
            } else {
                $this->_f3->set('errors["lName"]',
                    'Last name must be all alphabet');
            }

            $email = trim($_POST['email']);

            if (Validate::validEmail($email)) {
                $newApp->setEmail($email);

//            $_SESSION['email'] = $email;
            } else {
                $this->_f3->set('errors["email"]',
                    'Enter a valid email address');
            }


            $phone = trim($_POST['phone']);

            if (Validate::validPhone($phone)) {
                $newApp->setPhone($phone);

            } else {
                $this->_f3->set('errors["phone"]',
                    'Invalid phone number');
            }


            if (empty($this->_f3->get('errors'))) {
                $_SESSION['newApp'] = $newApp;
                $this->_f3->reroute('experience');
            }
        }
        $view = new Template();
        echo $view->render('views/personalInfo.html');
    }

    function experience(){
        $this->_f3->set('yearsEx', array("0-2", "2-4", "4+"));
        $this->_f3->set('relocate', array("yes", "no", "maybe"));





        //If the form has been submitted
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $newApp = new Applicant();

            $github= trim($_POST['github']);

            if (Validate::validGithub($github)){
                $newApp->setGithub($github);

//            $_SESSION['email'] = $email;
            }
            else{
                $this->_f3->set('errors["github"]',
                    'Enter a valid link');
            }



            if (empty($this->_f3->get('errors'))) {
                $_SESSION['newApp'] = $newApp;
                $this->_f3->reroute('experience');
            }

            //Move the data from Post array to the SESSION array
            $_SESSION['bio'] = $_POST['bio'];

//        $_SESSION['github'] = $_POST['github'];
            $_SESSION['years'] = $_POST['years'];
            $_SESSION['locate'] = $_POST['locate'];


            //Redirect to summary page
            $this->_f3->reroute('mailing');
        }
        $view = new Template();
        echo $view->render('views/experience.html');
    }

    function mailingList()
    {


        $this->_f3->set('mailing1', array("Javascript", "PHP", "Java", "Python"));
        $this->_f3->set('mailing2',array("HTML", "CSS", "Reactjs", "NodeJs"));
        $this->_f3->set('mailing3', array("Saas","Health Tech", "Ag Tech", "Hr Tech"));
        $this->_f3->set('mailing4', array("Industrial Tech", "Cyber Security"));



        //If the form has been submitted
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {

            //Move the data from Post array to the SESSION array

            $mailString = implode(", ",$_POST['mail']);
            $_SESSION['newApp']->setEMail($mailString);

            //Redirect to summary page
            $this->_f3->reroute('sum');

        }
        $view = new Template();
        echo $view->render('views/mailingList.html');
    }
    function summary()
    {
        //instantiate a view
        $view = new Template();
        echo $view -> render('views/summary.html');
        $id = $GLOBALS['dataLayer']->insertApp($_SESSION['newApp']);


        //destroy the session
        session_destroy();
    }

    function admin(){
        //just testing the other functions
    $GLOBALS['dataLayer']->getApplicant(2);
    $applicants = $GLOBALS['dataLayer']->getApplicant(2);
    $this->_f3-> set('applicant', $applicants);


    $view = new Template();

    echo $view -> render("views/admin.html");
}



}