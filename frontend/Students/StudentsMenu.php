<?php
    session_start();

    $_SESSION['ID'] = null;
    $_SESSION['FName'] = null;
    $_SESSION['LName'] = null;
    $_SESSION['Occupation'] = null;
    $_SESSION['Email'] = null;
    $_SESSION['Subject'] = null;
    $_SESSION['students'] = null;
?>
<html>
    <head>
        <link rel="stylesheet" href="../../css/wow.css">
    </head>
    <body>
        <h1>ADMIN RECORD SYSTEM - STUDENT MENU</h1>
        <form name="menu" method="post">
            <input class="listBtn" name="Create" type="submit" value="Create New STUDENT Record"><br>
            <input class="listBtn" name="View" type="submit" value="View/Edit STUDENT Records"><br>
            <input class="listBtn" name="MainMenu" type="submit" value="Go back to MAIN MENU"><br>
        </form>
        <?php
            if(isset($_POST['Create'])){
               header('location: ./CreateStudent.php');
            }
            else if(isset($_POST['View'])){
                header('location: ./StudentsView.php');
            }
            else if(isset($_POST['MainMenu'])){
                header('location: ../mainUI/mainMenu.php');
            }
        ?>
    </body>
</html>