<?php
class Applicant_SubscribedToLists extends applicant{

    private $_selectionsJobs = array();
    private $_selectionsVerticals = array();

    /**
     * @param array $_selectionsJobs
     * @param array $_selectionsVerticals
     */
    public function __construct(array $_selectionsJobs, array $_selectionsVerticals)
    {
        $this->_selectionsJobs = $_selectionsJobs;
        $this->_selectionsVerticals = $_selectionsVerticals;
    }

    /**
     * @return array
     */
    public function getSelectionsJobs()
    {
        return $this->_selectionsJobs;
    }

    /**
     * @return array
     */
    public function getSelectionsVerticals()
    {
        return $this->_selectionsVerticals;
    }

    /**
     * @param  $selectionsJobs
     */
    public function setSelectionsJobs( $selectionsJobs)
    {
        $this->_selectionsJobs = $selectionsJobs;
    }

    /**
     * @param  $selectionsVerticals
     */
    public function setSelectionsVerticals( $selectionsVerticals)
    {
        $this->_selectionsVerticals = $selectionsVerticals;
    }






}