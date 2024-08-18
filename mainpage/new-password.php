<?php 
session_start();
@include "../main page/database.php";
require_once "../main page/controllerUserData.php"; 

$email = $_SESSION['email'];
if (!$email) {
    header('Location: ../main page/login.php');
    exit();
}

$errors = array();

if (isset($_POST['change-password'])) {
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    if ($password !== $cpassword) {
        $errors['password'] = "Confirm password does not match!";
    } else {
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $update_pass = "UPDATE Dbname SET code = 0, password = '$encpass' WHERE email = '$email'";
        if (mysqli_query($conn, $update_pass)) {
            $_SESSION['info'] = "Your password has been changed. You can now login.";
            header('Location: ../main page/password-changed.php');
            exit();
        } else {
            $errors['db-error'] = "Failed to change your password: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create a New Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../main page/CSS/passwords.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="" method="POST" autocomplete="off">
                    <h2 class="text-center">New Password</h2>
                    <?php 
                    if (isset($_SESSION['info'])) {
                        echo '<div class="alert alert-success text-center">' . $_SESSION['info'] . '</div>';
                    }
                    ?>
                    <?php
                    if (count($errors) > 0) {
                        echo '<div class="alert alert-danger text-center">' . implode("<br>", $errors) . '</div>';
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Create new password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm your password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="change-password" value="Change">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
