<?php
include ('./application/controllers/servicies/login.php')
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="./application/style/style.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>

</head>
<body>
<div class="iteh_login">
    <div class="iteh_login_container">
        <form class="iteh_login_form" action="" method="post">
            Username: <input class="iteh_login_input" type="text" name="username"><br>
            Password: <input class="iteh_login_input" type="password" name="password"><br>
            <input class="iteh_login_button" type="submit" value="Submit">
        </form>
        <div class="iteh_login_container_helper"></div>
    </div>
    <div class="iteh_login_container_helper"></div>
</div>
</body>
</html>

