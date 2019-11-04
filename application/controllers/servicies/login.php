<?php
include("application/connection.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = mysqli_real_escape_string($mysqli,$_POST['username']);
    $mypassword = mysqli_real_escape_string($mysqli,$_POST['password']);

    $sql = "SELECT id FROM users WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($mysqli,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if($count == 1) {
        $_SESSION['id'] = $row['id'];
        header("location: contacts.php");
        exit();
    }else {
        $error = "User doesn't exists";
    }
}
?>
