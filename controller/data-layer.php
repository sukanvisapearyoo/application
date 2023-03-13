<?php
require $_SERVER['DOCUMENT_ROOT'].'/../config.php';

/**
 * datalayer class will hold any values and array values to be valdiates and store in
 * the applicant class
 */
class DataLayer

{
    private $_dbh;

    function __construct()
    {
        try {
            //Instantiate a database object
            $this->_dbh = new PDO (DB_DSN, DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function insertApp($applicant)
    {
        //1. define the query
        $sql = "INSERT INTO applicant (fName,lName,email,states,phone,github,
                       experience,relocate,bio,mailing_list_signup,mailing_lists_subscriptions) 
                VALUE(:fName,:lName,:email,:states,:phone,:github,:experience,
                        :relocate,:bio,mailing_list_signup,:mailing_lists_subscriptions)";

        //2. prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. bind the parameters
        $fName = $applicant->getFName();
        $lName = $applicant->getLName();
        $email = $applicant->getEMail();
        $states = $applicant->getStates();
        $phone = $applicant->getPhone();
        $github = $applicant->getGitHub();
        $experience = $applicant->getExperience();
        $relocate = $applicant-> getRelocate();
        $bio = $applicant->getBio();
        if($applicant instanceof Applicant_SubscribedToLists){
            $mailing_list_signup = 1;

        }else{
            $mailing_list_signup = 0;
            $mailing_lists_subscriptions = null;
        }
        $statement->bindParam(':fName',$fName);
        $statement->bindParam(':lName',$lName);
        $statement->bindParam(':email',$email);
        $statement->bindParam(':states',$states);
        $statement->bindParam(':phone',$phone);
        $statement->bindParam(':github',$github);
        $statement->bindParam(':experience',$experience);
        $statement->bindParam(':relocate',$relocate);
        $statement->bindParam(':bio',$bio);
        $statement->bindParam(':mailing_list_signup',$mailing_list_signup);
        $statement->bindParam(':mailing_lists_subscriptions',$mailing_lists_subscriptions);


        //4.execute the statement
        $statement->execute();

        //5.process the result
        var_dump($statement->errorInfo());
        $id = $this->_dbh->lastInsertId();
        return $id;
    }

    static function getMail()
    {
        return array("JavaScript", "PHP", "Java", "Python", "HTML", "CSS", "ReactJs", "NodeJs");
    }

    static function getExperience()
    {
        return array("0-2", "2-4", "4+");
    }
    static function getRelocate()
    {
        return array("Yes", "No", "Maybe");
    }
//        $this->_f3->set('yearsEx', array("0-2", "2-4", "4+"));
//        $this->_f3->set('relocate', array("yes", "no", "maybe"));

    function getApplicant()
    {
        //1.define the query
        $sql = "SELECT * FROM applicant WHERE id = :id ORDER BY lName ASC";
        //2.prepare the statement
        $statement = $this->_dbh -> prepare($sql);
        //3.bind the parameters
        $statement->bindParam(':id',$id);

        //4.execute the statement
        $statement->execute();

        //5.process the result

        $row =  $statement->fetch(PDO::FETCH_ASSOC);
        echo $row['aid'].', '.$row['fName'].", ".$row['lName'];
    }


}