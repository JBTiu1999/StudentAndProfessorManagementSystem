<html>
<head>
<link rel="stylesheet" href="./css/wow.css">
</head>
<body>
    <h1>Admin Record System - LOG IN</h1>
    <br>
    <br>
    <form action="" method="post">
        <div class="login"><p>Username </p>&nbsp;<input style="" type="text" name="username" size=30></div>
        <div class="login"><p>Password </p>&nbsp;&nbsp;<input type="password" name="password" size=30></div>
        <input id="loginBtn" type="submit" value="Log In" name="admin" id="admin">
    </form>
    <?php
        if(isset($_POST['admin'])){
            if($_POST['username'] == "Admin" && $_POST['password'] == "123"){
                echo "<script>alert('Logged In Successfully.');</script>";
                header('location: ./frontend/mainUI/mainMenu.php');
            }
            else{
                echo "<script>alert('Wrong Credentials!');</script>";
            }
        }
    ?>
</body>
</html>
