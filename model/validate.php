<?php
 class Validate
 {

//return true if food have atlest two characters
    static function validFirstName($fName)
    {

        $pattern = '/^[a-zA-Z]+$/';
        return preg_match($pattern, $fName);
    }

   static  function validLastName($lName)
    {

        $pattern = '/^[a-zA-Z]+$/';
        return preg_match($pattern, $lName);
    }

    static function validEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
//    return true;
    }


    static function validPhone($phone)
    {
        $pattern = '/^\d{3}-\d{3}-\d{4}$/';
        if (preg_match($pattern, $phone))
            return true;

        return false;
    }

    static function validGithub($link) {
        $pattern = '/^(https?:\/\/)?(www\.)?github\.com\/([a-zA-Z0-9-]+\/[a-zA-Z0-9-_]+)\/?$/';
        return preg_match($pattern, $link);
    }

}



