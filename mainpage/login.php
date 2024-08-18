<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

@include '../main page/database.php';
require_once "../main page/controllerUserData.php";

if (!$conn) {
    die('Database connection failed: ' . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);

    $select = "SELECT * FROM Dbname WHERE email = '$email' AND password = '$pass'";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        if ($row['user_type'] == 'admin') {
            $_SESSION['admin_name'] = $row['name'];
            header('location:../main page/admin.php');
            exit();
        } elseif ($row['user_type'] == 'user') {
            $_SESSION['user_name'] = $row['name'];
            header('location:../main page/user.php');
            exit();
        }
    } else {
        $error[] = 'Incorrect email or password!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codek</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../main page/CSS/login.css?v=<?php echo time();?>">
    <link rel="stylesheet" type="text/css" href="../main page/CSS/mainStyle.css?v=<?php echo time();?>">
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
            <form action="vaidate.php" method="post">
                <h3>Login now</h3>
                <?php
                if (isset($error)) {
                    foreach ($error as $err) {
                        echo '<span class="error-msg">'.$err.'</span><br>';
                    }
                }
                ?>
                <input type="email" name="email" required placeholder="Enter your email">
                <input type="password" name="password" required placeholder="Enter your password">
                <div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password?</a></div>
                <input type="submit" name="submit" value="Login now" class="form-btn">
                
                <p>Don't have an account? <a href="../main page/SignUp.php">SignUp</a></p>
            </form>
        </div>
    </main>
</body>

</html>
