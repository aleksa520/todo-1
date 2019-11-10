<?php
include("./application/controllers/api/Logs.php");

switch ($_SERVER['REQUEST_METHOD']){
    case 'POST':
        if(isset($_POST['username']) && isset($_POST['password'])){
            session_start();
            $dbConnection = new DBConnector();
            $myusername = mysqli_real_escape_string($dbConnection->getConnection(),$_POST['username']);
            $mypassword = mysqli_real_escape_string($dbConnection->getConnection(),$_POST['password']);
            Logs::Login($myusername, $mypassword);
        }
        break;
    case 'GET':
        Logs::Logout();
        break;

}