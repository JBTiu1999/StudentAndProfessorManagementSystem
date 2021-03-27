<?php
    function getPersonID($occupation){
		include 'dbh.inc.php';
			
		$resultArray = array();
		if($occupation != ""){
			$sql = "SELECT PersonID FROM Person where Occupation = '$occupation' AND Archived = 0";
		}
		else{
			$sql = "SELECT PersonID FROM Person where Archived = 0";
		}
				
		$result = mysqli_query($link, $sql);
		if($result){
			if (mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
					array_push($resultArray ,$row['PersonID']);
				}
			}
			//clear result variable
			mysqli_free_result($result);
		}
		else{
			echo "";
		}
		mysqli_close($link);
		return $resultArray;
	}

	function getPersonFirstName($occupation){
		include 'dbh.inc.php';
			
		$resultArray = array();
		
		if($occupation != ""){
			$sql = "SELECT FirstName FROM Person where Occupation = '$occupation' AND Archived = 0";
		}
		else{
			$sql = "SELECT FirstName FROM Person where Archived = 0";
		}		
		$result = mysqli_query($link, $sql);
		if($result){
			if (mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
					array_push($resultArray ,$row['FirstName']);
				}
			}
			//clear result variable
			mysqli_free_result($result);
		}
		else{
			echo "";
		}
		mysqli_close($link);
		return $resultArray;
	}
	function getPersonLastName($occupation){
		include 'dbh.inc.php';
			
		$resultArray = array();
		
		if($occupation != ""){
			$sql = "SELECT LastName FROM Person where Occupation = '$occupation' AND Archived = 0";
		}
		else{
			$sql = "SELECT LastName FROM Person where Archived = 0";
		}

		$result = mysqli_query($link, $sql);
		if($result){
			if (mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
					array_push($resultArray ,$row['LastName']);
				}
			}
			//clear result variable
			mysqli_free_result($result);
		}
		else{
			echo "";
		}
		mysqli_close($link);
		return $resultArray;
	}
	function getPersonOccupation($occupation){
		include 'dbh.inc.php';
			
		$resultArray = array();
		
		if($occupation != ""){
			$sql = "SELECT Occupation FROM Person where Occupation = '$occupation' AND Archived = 0";
		}	
		else{
			$sql = "SELECT Occupation FROM Person where Archived = 0";
		}

		$result = mysqli_query($link, $sql);
		if($result){
			if (mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
					array_push($resultArray ,$row['Occupation']);
				}
			}
			//clear result variable
			mysqli_free_result($result);
		}
		else{
			echo "";
		}
		mysqli_close($link);
		return $resultArray;
	}

	function getPersonSubject($occupation){
		include 'dbh.inc.php';
			
		$resultArray = array();
			
		if($occupation != ""){
			$sql = "SELECT CourseCode FROM Person where Occupation = '$occupation' AND Archived = 0";
		}
		else{
			$sql = "SELECT CourseCode FROM Person where Archived = 0";
		}

		$result = mysqli_query($link, $sql);
		if($result){
			if (mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
					array_push($resultArray ,$row['CourseCode']);
				}
			}
			//clear result variable
			mysqli_free_result($result);
		}
		else{
			echo "";
		}
		mysqli_close($link);
		return $resultArray;
	}

	function updatePersonDetails($occupation, $id, $firstname, $lastname, $courses){
		include 'dbh.inc.php';
				
		$sql = "UPDATE Person SET LastName ='$lastname', FirstName = '$firstname', CourseCode = '$courses' WHERE PersonID = $id";
		if(!mysqli_query($link, $sql)){
		}
		mysqli_close($link);
	}

	function removePerson($id){
		include 'dbh.inc.php';
				
		$sql = "UPDATE Person SET Archived = 1 WHERE PersonID = $id";
		if(!mysqli_query($link, $sql)){
		}
		mysqli_close($link);
	}

	function getNextAvailableID(){
		include 'dbh.inc.php';
				
		$sql = "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'proglangs' AND TABLE_NAME = 'Person'";
		
		$result = mysqli_query($link, $sql);

		$id = 0;

		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				$id = $row["AUTO_INCREMENT"];
			}
		}
		mysqli_close($link);

		return $id;
	}

	function addNewPerson($ln, $fn, $course, $occupation){
		include 'dbh.inc.php';

		$sql = "INSERT INTO Person (FirstName, LastName, CourseCode, Occupation) VALUES ('$fn', '$ln', '$course', '$occupation');";
		
		$result = mysqli_query($link, $sql);
	}
?>