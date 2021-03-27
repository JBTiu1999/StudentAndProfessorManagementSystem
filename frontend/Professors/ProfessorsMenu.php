<?php
    session_start();

    $_SESSION['ID'] = null;
    $_SESSION['FName'] = null;
    $_SESSION['LName'] = null;
    $_SESSION['Occupation'] = null;
    $_SESSION['Email'] = null;
    $_SESSION['Subject'] = null;
    $_SESSION['professors'] = null;
?>
<html>
    <head>
        <link rel="stylesheet" href="../../css/wow.css">
    </head>
    <body>
        <h1>ADMIN RECORD SYSTEM - PROFESSOR MENU</h1>
        <form name="menu" method="post">
            <input class="listBtn" name="Create" type="submit" value="Create New PROFESSOR Record"><br>
            <input class="listBtn" name="View" type="submit" value="View/Edit PROFESSOR Records"><br>
            <input class="listBtn" name="MainMenu" type="submit" value="Go back to MAIN MENU"><br>
        </form>
        <?php
            if(isset($_POST['Create'])){
               header('location: ./CreateProfessor.php');
            }
            else if(isset($_POST['View'])){
                header('location: ./ProfessorsView.php');
            }
            else if(isset($_POST['MainMenu'])){
                header('location: ../mainUI/mainMenu.php');
            }
        ?>
    </body>
</html>