<?php

include './../../connection.php';
session_start();

$new_user_json = file_get_contents("php://input");
$new_user = json_decode($new_user_json);
print_r($new_user);
if(isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
    $sql = "UPDATE users SET first_name = \"$new_user->first_name\", last_name = \"$new_user->last_name\", username = \"$new_user->username\", password = \"$new_user->password\" WHERE id =  \"$user_id\"";
    $result = $mysqli->query($sql);
    print_r($sql);
}


