<?php
include_once './Backend/FIT.php';
include_once './Backend/Person.php';
include_once './Database/DatabaseOperations.php';


//updatePersonDetails("Student", 201910002, "Someone", "Something", "Hakdog");
//echo getNextAvailableID();
//echo var_dump(getPersonLastName(''));
$id = getPersonID("");
$firstname = getPersonFirstName("");
$lastname = getPersonLastName("");
echo var_dump($id);
echo var_dump($firstname);
echo var_dump($lastname);

for($i = 0; $i < count($id); $i++){
    echo "$i";
    if(stripos("Gabri", $firstname[$i]) !== false || strpos("Gab", $lastname[$i]) !== false){
        echo "Found";
    }
}
?>
