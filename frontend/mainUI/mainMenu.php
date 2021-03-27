<?php
    session_start();
    $_SESSION['display'] = array();
?>
<html>
    <head>
        <link rel="stylesheet" href="../../css/wow.css">
    </head>
    <body>
        <h1>ADMIN RECORD SYSTEM - MAIN MENU</h1>
        <form name="menu" method="post">
            <input class="listBtn" name="Search" type="submit" value="Search"><br>
            <input class="listBtn" name="StudentsMenu" type="submit" value="Students Menu"><br>
            <input class="listBtn" name="ProfessorsMenu" type="submit" value="Professors Menu"><br>
            <input class="listBtn" name="Exit" type="submit" value="Exit">
        </form>
        <?php
            if(isset($_POST['Search'])){
               header('location: search.php');
            }
            else if(isset($_POST['StudentsMenu'])){
                header('location: ../Students/StudentsMenu.php');
            }
            else if(isset($_POST['ProfessorsMenu'])){
                header('location: ../Professors/ProfessorsMenu.php');
            }
            else if(isset($_POST['Exit'])){
                header('location: ../../index.php');
            }
        ?>
    </body>
</html>