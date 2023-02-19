<?php

//return true if food have atlest two characters
function validFirstName($fName)
{

    $pattern = '/^[a-zA-Z]+$/';
    return preg_match($pattern, $fName);
}
function validLastName($lName)
{

    $pattern = '/^[a-zA-Z]+$/';
    return preg_match($pattern, $lName);
}
function validEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
//function validEmail($email){
//    if (strpos($email,"@" )!== false)
//        return true;
//
//    return false;
//}


//function validExperience($str)
//{
//    // Check if the string is not empty
//    if (empty($str)) {
//        return false;
//    }
//
//    // Ensure that the string is alphanumeric
//    if (!ctype_alnum($str)) {
//        return false;
//    }
//    return false;
//}

function validPhone($phone){
    // Check that the phone number is in the correct format
    if (!preg_match('/^\+?[0-9]{10,14}$/', $phone)) {
        return false;
    }
}

function validGithub($github){
    if (strpos($github,"github" )!== false)
        return true;

    return false;
}




