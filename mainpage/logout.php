<?php

@include '../main page/database.php';

session_start();
session_unset();
session_destroy();

header('location:../main page/login.php');

?>