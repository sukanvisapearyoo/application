<?php
class Applicant_SubscribedToLists extends Applicant{

    private $_selectionsJobs;
    private $_selectionsVerticals;

//    /**
//     * @param array $_selectionsJobs
//     * @param array $_selectionsVerticals
//     */
//    public function __construct(array $_selectionsJobs, array $_selectionsVerticals)
//    {
//        $this->_selectionsJobs = $_selectionsJobs;
//        $this->_selectionsVerticals = $_selectionsVerticals;
//    }

    public function getJobs()
    {
        return $this->_selectionsJobs;
    }

    public function setJobs($selectionJobs)
    {
        $this->_selectionsJobs = $selectionJobs;
    }


    public function getVertical()
    {
        return $this->_selectionsVerticals;
    }

    public function setVertical($selectionVerticals)
    {
        $this->_selectionsVerticals = $selectionVerticals;
    }




}