<?php
if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
    $secretkey = "your secret-key";
    $ip = $_SERVER['REMOTE_ADDR'];
    $response = $_POST['g-recaptcha-response'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$response&remoteip=$ip";

    $fire = file_get_contents($url);
    $data = json_decode($fire, true);
    if($data->success==true){
        echo "success";
    }
} else {
    echo "Fill reCAPTCHA";
}
?>
