<?php
session_start();
include '../DBConnector.php';


class User
{

    public static function get($id = null){
        $dbConnection = new DBConnector();
        $userid = $_SESSION['id'];
        $sql = "SELECT * FROM users WHERE id = '$userid'";
        $result = $dbConnection->getConnection()->query($sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        echo json_encode($row);
    }

    public static function put($user){
        $dbConnection = new DBConnector();
        if(isset($_SESSION['id'])) {
            $user_id = $_SESSION['id'];
            $sql = "UPDATE users SET first_name = \"$user->first_name\", last_name = \"$user->last_name\", username = \"$user->username\", password = \"$user->password\" WHERE id =  \"$user_id\"";
            $result = $dbConnection->getConnection()->query($sql);
            print_r($sql);
        }
    }


}