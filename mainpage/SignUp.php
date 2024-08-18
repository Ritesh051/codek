<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

@include '../main page/database.php';
require_once "../main page/controllerUserData.php";

if (!$conn) {
    die('Database connection failed: ' . mysqli_connect_error());
} 

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];
    $code = rand(999999, 111111);
    $status = "NotVerified";

    $select = "SELECT * FROM Dbname WHERE email = '$email'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $error[] = 'User already exists!';
    } else {
        if ($pass != $cpass) {
            $error[] = 'Passwords do not match!';
        } else {
            $insert = "INSERT INTO Dbname(name, email, password, user_type, code, status) VALUES('$name','$email','$pass','$user_type', '$code', '$status')";
            if (mysqli_query($conn, $insert)) {
                header('location:../main page/login.php');
                exit();
            } else {
                $error[] = 'Error: ' . mysqli_error($conn);
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="apple-touch-icon" sizes="180x180" href="../images/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../main page/CSS/mainStyle.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="../main page/CSS/SignUp.css?v=<?php echo time();?>">
</head>

<body>
    <header>
        <nav>
            <div class="left">CODEK</div>
            <div class="right">
                <ul>
                    <li><a href="../main page/index.php">Home</a></li>
                    <li><a href="../main page/index.php">About</a></li>
                    <li><a href="../main page/index.php">Blog</a></li>
                    <li><a href="../main page/index.php">Contact Me</a></li>
                    <li><a href="../main page/login.php">Login</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="form-container">
            <form action="validate.php" method="POST">
                <h3>SignUp now</h3>
                <?php
                if (isset($error)) {
                    foreach ($error as $err) {
                        echo '<span class="error-msg">'.$err.'</span><br>';
                    }
                }
                ?>
                <input type="text" name="name" required placeholder="Enter your name">
                <input type="email" name="email" required placeholder="Enter your email">
                <input type="password" name="password" required placeholder="Enter your password">
                <input type="password" name="cpassword" required placeholder="Confirm your password">
                <select name="user_type">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <br>
                <div class="g-recaptcha" data-sitekey="6Ld62xEqAAAAAOiVuTlKp1Kd64qB2Tr0cnKU7oFg" data-callback="enableSubmitBtn"></div>
                <input type="submit" name="submit" id="mysubmitBtn" disabled = "disabled" value="SignUp now" class="form-btn">
                <p>Already have an account? <a href="../main page/login.php">Login now</a></p>
            </form>
        </div>
    </main>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        function enableSubmitBtn(){
            document.getElementById("mysubmitBtn").disable=false;
        }
    </script>
</body>

</html>
