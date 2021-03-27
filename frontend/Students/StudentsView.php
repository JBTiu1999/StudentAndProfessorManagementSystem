<?php
    session_start();
    include_once '../../Backend/Person.php';
    include_once '../../Backend/Student.php';
    $ID = getPersonID("Student");
    $LastName = getPersonLastname("Student");
    $FirstName = getPersonFirstName("Student");
    $CourseCode = getPersonSubject("Student");
    $Occupation = getPersonOccupation("Student");
    $Subjects = array();
?>
<html>
    <head>
        <link rel="stylesheet" href="../../css/wow.css">
    </head>
    <body>
        <h1>ADMIN RECORD SYSTEM - STUDENT EDIT / DELETE</h1>
        <div style="margin: 100px 0px 0px 100px; width:500;">
            <form action="" method="post">
                <select style="width:500px; margin:0px 0px 5px; height: 40px;" name="students" id="">
                    <option value="">-Select a Student-</option>
                    <?php
						for($i = 0; $i < count($ID); $i++){
                            $student = new Student($ID[$i], $FirstName[$i], $LastName[$i]);
                            $Subjects = $student->subjects;
					?>
                            <option value=<?php echo $student->getID()?>>
                                <?php echo $student->getID() . "--" . $student->getLName() . ", " . $student->getFName() ?>   
                            </option>
                    <?php 
                        }
					?>
                </select>
                <input type="submit" value="Select Student" name="details" style="margin: 0px 0px 25px; length: 100px;">
            </form>
            <?php
                if(isset($_POST['details'])){
                    if($_POST['students'] != ""){
                        $index = array_search($_POST['students'], $ID);
                        $_SESSION['ID'] = $ID[$index];
                        $_SESSION['FName'] = $FirstName[$index];
                        $_SESSION['LName'] = $LastName[$index];
                        $_SESSION['Occupation'] = $Occupation[$index];
                        $_SESSION['Email'] = $student->createEmail($ID[$index], $FirstName[$index], $LastName[$index]);
                        $_SESSION['Subject'] = $Subjects[$index];
                    }
                    else{
                        echo "<script>alert('No selected student!');</script>";
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
                    echo "<script>alert('No selected student!');</script>";
                }
                else{
                    header('location: EditStudent.php');
                }
            }
            else if(isset($_POST['delete'])){
                removePerson($_SESSION['ID']);
                header('location: StudentsMenu.php');
            }
            else if(isset($_POST['back'])){
                header('location: StudentsMenu.php');
            }
        ?>
    </body>
</html>