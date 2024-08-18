<?php
session_start();
@include '../main page/database.php';
require_once "../main page/controllerUserData.php";

// Redirect to login if no info is set
if (!isset($_SESSION['info'])) {
    header('Location: ../main page/login.php');  
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Changed</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../main page/CSS/passwords.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <?php 
                if (isset($_SESSION['info'])) {
                    echo '<div class="alert alert-success text-center">' . $_SESSION['info'] . '</div>';
                    unset($_SESSION['info']);
                }
                ?>
                <form action="../main page/login.php" method="POST">
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login-now" value="Login Now">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
