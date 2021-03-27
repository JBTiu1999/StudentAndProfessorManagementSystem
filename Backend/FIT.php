<?php
interface FIT {
    public function createEmail($id, $fn, $ln);
    public function addSubjects($targetSubjects);
    public function encode();
    public function getReference(); //This method will be used for lists
    public function getDetailsReference(); //Updates selected item to views
    
    //public LinkedList subjects = new LinkedList();   
    //      --> Cannot add this attribute to interface because the variable will be static, only 1 version throughout all instances
     //Max no of units a professor can teach per term
    
}

?>
