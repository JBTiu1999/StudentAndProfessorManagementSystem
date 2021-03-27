<?php
    include_once '../../Backend/Person.php';
    include_once '../../Backend/Student.php';
    session_start();
    $subjects = explode(", ", $_SESSION['Subject']);
?>

<html>
    <head>
        <link rel="stylesheet" href="../../css/wow.css">
    </head>
    <body>
        <h1>ADMIN RECORD SYSTEM - EDIT STUDENT</h1>
        <form action="" method="post">
            <div style="margin: 100px 0px 0px 100px; width:500;">
                <div class="view"><p>ID Number (System Generated)<textarea readonly class="txtAreaStudents" name="" id=""  rows="1"><?php echo ($_SESSION['ID'] != "" ? $_SESSION['ID'] : "") ?></textarea></p></div>
                <div class="view"><p>First Name <textarea class="txtAreaStudents" id="" name="fname" rows="1"><?php echo ($_SESSION['FName'] != "" ? $_SESSION['FName'] : "") ?></textarea></p></div>
                <div class="view"><p>Last Name <textarea class="txtAreaStudents" id=""  name="lname" rows="1"><?php echo ($_SESSION['LName'] != "" ? $_SESSION['LName'] : "") ?></textarea></p></div>
                <div class="view"><p>Subject (STRICTLY follow format: Ex. Subject1 Subject2 Subject 3 ...)<br><textarea class="txtAreaStudents" style="height: 150px" name="subj" id=""  rows="1"><?php
                    for($i = 0; $i < count($subjects); $i++){
                        if($i != count($subjects) - 1)
                            echo $subjects[$i] . " ";
                        else
                            echo $subjects[$i];
                    }
                ?></textarea></p></div>
            </div>
            <div style="margin: 200px 0px 0px 100px;" class="listBtn">
                <form action="" method="post">
                    <div style="display: flex; justify-content: space-evenly">
                        <input style="height: 40px; width: 240px" type="submit" name="cancel" value="Cancel">
                        <input style="height: 40px; width: 240px" type="submit" name="submit" value="Submit">
                    </div>
            </div>
        </form>
        <?php
            if(isset($_POST['cancel'])){
                header('location: StudentsMenu.php');
            }
            else if(isset($_POST['submit'])){
                $subjects = str_replace(" ", ", ", $_POST['subj']);
                $student = new Student($_SESSION['ID'], $_POST['fname'], $_POST['lname']);
                $student->subjects = $subjects;
                $student->encode();
                header('location: StudentsMenu.php');
            }
        ?>
    </body>
</html>