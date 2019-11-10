<?php
include("../api/Contact.php");
switch ($_SERVER['REQUEST_METHOD']){
    case 'GET':
        if(isset($_GET['id'])){
            Contact::get($_GET['id']);
        }else{
            Contact::get();
        }
        break;
    case 'POST':
        if(isset($_POST['inputText'])){
            Contact::search($_POST['inputText']);
        }else{
            $dbConnection = new DBConnector();
            $name = mysqli_real_escape_string($dbConnection->getConnection(), $_POST['contact']['first_name']);
            $lastname = mysqli_real_escape_string($dbConnection->getConnection(), $_POST['contact']['last_name']);
            $date = mysqli_real_escape_string($dbConnection->getConnection(), $_POST['contact']['date']);
            $email = mysqli_real_escape_string($dbConnection->getConnection(), $_POST['contact']['email']);
            $phone = mysqli_real_escape_string($dbConnection->getConnection(), $_POST['contact']['phone']);
            Contact::post($name, $lastname, $date, $email, $phone);
        }
        break;
    case 'PUT':
        $new_contact_json = file_get_contents("php://input");
        $new_contact = json_decode($new_contact_json);
        Contact::put($new_contact);
        break;
    case 'DELETE':
        $contactid = $_GET['id'];
        Contact::delete($contactid);
}
