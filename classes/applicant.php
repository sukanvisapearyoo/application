<?php
class Applicant {
    private $_fName;
    private $_lName;
    private $_email;
    private $_states;
    private $_phone;
    private $_github;
    private $_experience;
    private $_relocate;
    private $_bio;

    /**
     * @param $_fName
     * @param $_lName
     * @param $_email
     * @param $_states
     * @param $_phone
     * @param $_github
     * @param $_experience
     * @param $_relocate
     * @param $_bio
     */
    public function __construct($_fName = "", $_lName="", $_email = "", $_states = "", $_phone = "",
                                $_github = "", $_experience = "", $_relocate = "", $_bio = "")
    {
        $this->_fName = $_fName;
        $this->_lName = $_lName;
        $this->_email = $_email;
        $this->_states = $_states;
        $this->_phone = $_phone;
        $this->_github = $_github;
        $this->_experience = $_experience;
        $this->_relocate = $_relocate;
        $this->_bio = $_bio;
    }

    /**
     * @return mixed
     */
    public function getFName()
    {
        return $this->_fName;
    }

    /**
     * @return mixed
     */
    public function getLName()
    {
        return $this->_lName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @return mixed
     */
    public function getStates()
    {
        return $this->_states;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @return mixed
     */
    public function getGithub()
    {
        return $this->_github;
    }

    /**
     * @return mixed
     */
    public function getExperience()
    {
        return $this->_experience;
    }

    /**
     * @return mixed
     */
    public function getRelocate()
    {
        return $this->_relocate;
    }

    /**
     * @return mixed
     */
    public function getBio()
    {
        return $this->_bio;
    }




    /**
     * @param  $fName
     */
    function setFName($fName)
    {
        $this->_fName = $fName;
    }

    /**
     * @param  $_lName
     */
    function setLName($lName)
    {
        $this->_lName = $lName;
    }

    /**
     * @param  $email
     */
    function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @param  $states
     */
    function setStates($states)
    {
        $this->_states = $states;
    }

    /**
     * @param  $phone
     */
    function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /**
     * @param  $github
     */
    function setGithub($github)
    {
        $this->_github = $github;
    }

    /**
     * @param  $experience
     */
    function setExperience($experience)
    {
        $this->_experience = $experience;
    }

    /**
     * @param  $relocate
     */
    function setRelocate($relocate)
    {
        $this->_relocate = $relocate;
    }

    /**
     * @param  $bio
     */
    function setBio($bio)
    {
        $this->_bio = $bio;
    }






}