<?php

class Person {
    private $id;
    private $fname;
    private $lname;
    private $email;
    
    //Getter methods
    public function getId(){
        return $this->id;
    }
    public function getFname(){
        return $this->fname;
    }
    public function getLname(){
        return $this->lname;
    }
    public function getEmail(){
        return $this->email;
    }
    
    //Setter methods
    public function setId($target){
        $this->id = $target;
    }
    public function setFname($target){
        $this->fname = $target;
    }
    public function setLname($target){
        $this->lname = $target;
    }
    public function setEmail($target){
        $this->email = $target;
    }
}

?>
