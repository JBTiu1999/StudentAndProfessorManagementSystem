<?php
    include_once '../../Backend/Person.php';
    include_once '../../Backend/Student.php';
    include_once '../../Backend/Professor.php';
    session_start();

    $id = getPersonID("");
    $firstname = getPersonFirstName("");
    $lastname = getPersonLastName("");
    $course = getPersonSubject("");
    $occupation = getPersonOccupation("");
?>
<html>
    <head>
        <link rel="stylesheet" href="../../css/wow.css">
    </head>
    <body>
        <h1>ADMIN RECORD SYSTEM - SEARCH</h1>
        <div class="container">
            <form action="" method="post">
                <input class="searchBtn" type="submit" name="search" value="Search">
                <input class="searchBar" type="text" name="searchBar" placeholder="Enter a name..." id=""><br>
                <textarea readonly class="txtarea" name="output" cols="100" rows="10"><?php   
                if($_SESSION['display'] != null){
                    foreach($_SESSION['display'] as $search){
                        if($occupation[$search] == "Student"){
                            $student = new Student($id[$search], $firstname[$search], $lastname[$search]);
                            echo $student->getId() . " - " . $student->getLname() . " - " . $student->getFname() . " - " . $occupation[$search] . " - " . $student->getEmail() . " - " . $student->subjects[0] . "\n\n";
                        }
                        else if($occupation[$search] == "Professor"){
                            $professor = new Professor($id[$search], $firstname[$search], $lastname[$search]);
                            echo $professor->getId() . " - " . $professor->getLname() . " - " . $professor->getFname() . " - " . $occupation[$search] . " - " . $professor->getEmail() . " - " . $professor->subjects[0] . "\n\n";
                        }
                    }
                    $_SESSION['display'] = array();
                }
                else{
                    echo "";
                }
                ?></textarea><br>
                <input class="listBtn" style="width: 587px" name="back" type="submit" value="GO BACK">
            </form>
        </div>
        <?php
            if(isset($_POST['search'])){
                for($i = 0; $i < count($id); $i++){
                    if(stripos($firstname[$i], $_POST['searchBar']) !== false || strpos($lastname[$i], $_POST['searchBar']) !== false){
                        print($i);
                        array_push($_SESSION['display'], $i);
                        header("Refresh:0");
                    }
                }
            }
            else if (isset($_POST['back'])){
                header('location: mainMenu.php');
            }
        ?>
    </body>
</html>