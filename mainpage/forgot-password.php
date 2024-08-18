<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
 @include "../main page/database.php";
 require_once "../main page/controllerUserData.php";

$errors = [];
$email = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['check-email'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    if (empty($email)) {
        $errors[] = "Email address is required.";
    } else {
        $query = "SELECT * FROM Login_DB WHERE email='$email'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 0) {
            $errors[] = "No user found with this email address.";
        } else {

        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../main page/CSS/passwords.css?v=<?php echo time();?>">
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
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="" method="POST" autocomplete="">
                    <h2 class="text-center">Forgot Password</h2>
                    <p class="text-center">Enter your email address</p>
                    <?php
                    if (count($errors) > 0) {
                        echo '<div class="alert alert-danger text-center">';
                        foreach ($errors as $error) {
                            echo $error . "<br>";
                        }
                        echo '</div>';
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Enter email address" required value="<?php echo htmlspecialchars($email); ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check-email" value="Continue">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
