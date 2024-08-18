<?php

@include "../main page/database.php";
require_once "../main page/controllerUserData.php";

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:../main page/login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
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
        <div class="container">

            <div class="content">
                <h3>hi, <span>user</span></h3>
                <h1>welcome <span>
                        <?php echo $_SESSION['user_name'] ?>
                    </span></h1>
                <p>this is an user page</p>
                <a href="../main page/login.php" class="btn">login</a>
                <a href="../main page/SignUp.php" class="btn">register</a>
                <a href="../main page/logout.php" class="btn">logout</a>
            </div>

        </div>
    </main>
</body>

</html>