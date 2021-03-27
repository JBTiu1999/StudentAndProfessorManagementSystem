<?php
include_once '../../Database/DatabaseOperations.php';
include_once 'FIT.php';

class Professor extends Person implements FIT{
    
    public $subjects;
    
    function __construct($newID, $newFname, $newLname){
        //Creating a professor
        $this->setId($newID);
        $this->setFname($newFname);
        $this->setLname($newLname);
        $this->setEmail($this->createEmail($newID, $newFname, $newLname));
        $this->subjects=($this->getSubjects());
    }

    public function getSubjects(){
        return getPersonSubject("Professor");
    }

    public function createEmail($id, $fn, $ln) {
        //Replace all method called to avoid white spaces in email
        return strval($id . "_" . str_replace(" ", "", $ln) . "." . str_replace(" ", "", $fn) . "@fit.edu.ph");
    }

    function addSubjects($targetSubjects) {
        
        //if(((targetSubjects.size() + this.subjects.size()) * 3) > max){
        if(($targetSubjects.size() * 3) > 24){
            return false;
        }
        //Else...
        foreach($targetSubjects as $eachItem){
            $this->subjects.push($eachItem);
        }
        return true;
    }

    function encode() {
        updatePersonDetails("Professor", $this->getId(), $this->getFname(), $this->getLname(), $this->subjects);
    }

    public function getReference() {
        return $this->getId() + "--" + $this->getLname() + ", " + $this->getFname();
    }

    public function getDetailsReference() {
        $temp = [$this->getId(), $this->getLname(), $this->getFname(), "Professor", $this->getEmail(), str_replace("\n", ", ", $this->getSubjects())];
        return $temp;
    }
}

?>
