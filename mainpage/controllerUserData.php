<?php 
session_start();
require "../main page/database.php";

$email = "";
$name = "";
$errors = array();

if (isset($_POST['signup'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    if ($password !== $cpassword) {
        $errors['password'] = "Confirm password does not match!";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format!";
    } else {
        $email_check = "SELECT * FROM Dbname WHERE email = '$email'";
        $res = mysqli_query($conn, $email_check);
        if (mysqli_num_rows($res) > 0) {
            $errors['email'] = "Email already exists!";
        }
    }
}

if (isset($_POST['check'])) {
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
    $check_code = "SELECT * FROM Dbname WHERE code = '$otp_code'";
    $code_res = mysqli_query($conn, $check_code);

    if (mysqli_num_rows($code_res) > 0) {
        $fetch_data = mysqli_fetch_assoc($code_res);
        $email = $fetch_data['email'];
        $code = 0;
        $status = 'verified';

        $update_otp = "UPDATE Dbname SET code = '$code', status = '$status' WHERE email = '$email'";
        $update_res = mysqli_query($conn, $update_otp);

        if ($update_res) {
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            header('location: ../main page/index.php');
            exit();
        } else {
            $errors['otp-error'] = "Failed to update verification code!";
        }
    } else {
        $errors['otp-error'] = "Incorrect verification code!";
    }
}

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $check_email = "SELECT * FROM Dbname WHERE email = '$email'";
    $res = mysqli_query($conn, $check_email);

    if (mysqli_num_rows($res) > 0) {
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['password'];

        if (password_verify($password, $fetch_pass)) {
            $_SESSION['email'] = $email;
            $status = $fetch['status'];

            if ($status == 'verified') {
                header('location: ../main page/index.php');
            } else {
                $_SESSION['info'] = "Please verify your email - $email";
                header('location: ../main page/user-otp.php');
            }
        } else {
            $errors['email'] = "Incorrect email or password!";
        }
    } else {
        $errors['email'] = "You're not yet a member! Sign up below.";
    }
}

if (isset($_POST['check-email'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $check_email = "SELECT * FROM Dbname WHERE email='$email'";
    $run_sql = mysqli_query($conn, $check_email);

    if (mysqli_num_rows($run_sql) > 0) {
        $code = rand(999999, 111111);
        $insert_code = "UPDATE Dbname SET code = '$code' WHERE email = '$email'";
        $run_query = mysqli_query($conn, $insert_code);

        if ($run_query) {
            $subject = "Password Reset Code";
            $message = "Your password reset code is $code";
            $sender = "From: xyz@gmail.com";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: <xyz@gmail.com>' . "\r\n";

            if (mail($email, $subject, $message, $headers)) {
                $_SESSION['info'] = "We've sent a password reset OTP to your email - $email";
                $_SESSION['email'] = $email;
                header('location: ../main page/reset-code.php');
                exit();
            } else {
                $errors['otp-error'] = "Failed to send reset code! Please check your server configuration.";
            }
        } else {
            $errors['db-error'] = "Something went wrong!";
        }
    } else {
        $errors['email'] = "This email address does not exist!";
    }
}

if (isset($_POST['check-reset-otp'])) {
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
    $check_code = "SELECT * FROM Dbname WHERE code = '$otp_code'";
    $code_res = mysqli_query($conn, $check_code);

    if (mysqli_num_rows($code_res) > 0) {
        $fetch_data = mysqli_fetch_assoc($code_res);
        $email = $fetch_data['email'];
        $_SESSION['email'] = $email;
        $_SESSION['info'] = "Please create a new password.";
        header('location: ../main page/new-password.php');
        exit();
    } else {
        $errors['otp-error'] = "Incorrect code!";
    }
}

if (isset($_POST['change-password'])) {
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    if ($password !== $cpassword) {
        $errors['password'] = "Confirm password does not match!";
    } else {
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $email = $_SESSION['email'];
        $update_pass = "UPDATE Dbname SET code = 0, password = '$encpass' WHERE email = '$email'";
        
        if (mysqli_query($conn, $update_pass)) {
            $_SESSION['info'] = "Your password has been changed. You can now login.";
            header('Location: ../main page/password-changed.php');
            exit();
        } else {
            $errors['db-error'] = "Failed to change your password!";
        }
    }
}


if (isset($_POST['login-now'])) {
    header('Location: ../main page/login.php');
}


if (isset($_POST['login-now'])) {
    header('Location: ../main page/login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <?php 
    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo '<p style="color: red;">' . $error . '</p>';
        }
    }
    ?>
</body>
</html>
