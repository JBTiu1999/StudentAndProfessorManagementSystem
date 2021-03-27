<?php
    session_start();
    include_once '../../Database/DatabaseOperations.php';
    include_once '../../Backend/Person.php';
    include_once '../../Backend/Professor.php';
    $ID = getPersonID("Professor");
    $LastName = getPersonLastname("Professor");
    $FirstName = getPersonFirstName("Professor");
    $CourseCode = getPersonSubject("Professor");
    $Occupation = getPersonOccupation("Professor");
    $Subjects = array();
?>
<html>
    <head>
        <link rel="stylesheet" href="../../css/wow.css">
    </head>
    <body>
        <h1>ADMIN RECORD SYSTEM - PROFESSOR VIEW / DELETE</h1>
        <div style="margin: 100px 0px 0px 100px; width:500;">
            <form action="" method="post">
                <select style="width:500px; margin:0px 0px 5px; height: 40px;" name="professors" id="">
                    <option value="">-Select a Professor-</option>
                    <?php
						for($i = 0; $i < count($ID); $i++){
                            $professor = new Professor($ID[$i], $FirstName[$i], $LastName[$i]);
                            $Subjects = $professor->subjects;
					?>
                            <option value=<?php echo $professor->getID()?>>
                                <?php echo $professor->getID() . "--" . $professor->getLName() . ", " . $professor->getFName() ?>   
                            </option>
                    <?php 
                        }
					?>
                </select>
                <input type="submit" value="Select professor" name="details" style="margin: 0px 0px 25px; length: 100px;">
            </form>
            <?php
                if(isset($_POST['details'])){
                    if($_POST['professors'] != ""){
                        $index = array_search($_POST['professors'], $ID);
                        $_SESSION['ID'] = $ID[$index];
                        $_SESSION['FName'] = $FirstName[$index];
                        $_SESSION['LName'] = $LastName[$index];
                        $_SESSION['Occupation'] = $Occupation[$index];
                        $_SESSION['Email'] = $professor->createEmail($ID[$index], $FirstName[$index], $LastName[$index]);
                        $_SESSION['Subject'] = $Subjects[$index];
                    }
                    else{
                        echo "<script>alert('No selected professor!');</script>";
                    }
                }
            ?>
            <div class="view"><p>ID Number <textarea readonly class="txtAreaStudents" name="" id=""  rows="1"><?php echo ($_SESSION['ID'] != "" ? $_SESSION['ID'] : "") ?></textarea></p></div>
            <div class="view"><p>First Name <textarea readonly class="txtAreaStudents" name="" id="" rows="1"><?php echo ($_SESSION['FName'] != "" ? $_SESSION['FName'] : "") ?></textarea></p></div>
            <div class="view"><p>Last Name <textarea readonly class="txtAreaStudents" name="" id=""  rows="1"><?php echo ($_SESSION['LName'] != "" ? $_SESSION['LName'] : "") ?></textarea></p></div>
            <div class="view"><p>Occupation <textarea readonly class="txtAreaStudents" name="" id="" rows="1"><?php echo ($_SESSION['Occupation'] != "" ? $_SESSION['Occupation'] : "") ?></textarea></p></div>
            <div class="view"><p>Email <textarea readonly class="txtAreaStudents" name="" id="" rows="1"><?php echo ($_SESSION['Email'] != "" ? $_SESSION['Email'] : "") ?></textarea></p></div>
            <div class="view"><p>Subjects <textarea readonly class="txtAreaStudents" name="" id="" rows="1"><?php echo ($_SESSION['Subject'] != "" ? $_SESSION['Subject'] : "") ?></textarea></p></div>
        </div>
        <div class="listBtn">
            <form action="" method="post">
                <div style="display: flex; justify-content: space-evenly">
                    <input style="height: 40px; width: 150px" type="submit" name="edit" value="Edit This Record">
                    <input style="height: 40px; width: 150px" type="submit" name="delete" value="Delete This Record"><br>
                </div>
                <input style="margin: 50px 0px 0px 0px;" class="listBtn" name="back" type="submit" value="Go back to MAIN MENU">
            </form>
        </div>
        <?php
            if(isset($_POST['edit'])){
                if($_SESSION['ID'] == null){
                    echo "<script>alert('No selected professor!');</script>";
                }
                else{
                    header('location: EditProfessor.php');
                }
            }
            else if(isset($_POST['delete'])){
                removePerson($_SESSION['ID']);
                header('location: ProfessorsMenu.php');
            }
            else if(isset($_POST['back'])){
                header('location: ProfessorsMenu.php');
            }
        ?>
    </body>
</html>