<?php
include("../api/User.php");

switch ($_SERVER['REQUEST_METHOD']){
    case 'GET':
            $userid = $_SESSION['id'];
            User::get($userid);
        break;
    case 'PUT':
        $new_user_json = file_get_contents("php://input");
        $new_user = json_decode($new_user_json);
        User::put($new_user);
        break;
    case 'DELETE':
    case 'POST':
        break;
}
