<?php

include './../../connection.php';
session_start();

$contactid = file_get_contents("php://input");
echo $contactid;
if(isset($_SESSION['id'])) {
    $sql = "DELETE FROM contacts WHERE id = $contactid";
    $result = $mysqli->query($sql);
    print_r($sql);
}


