<?php

include './../../connection.php';
session_start();

$new_contact_json = file_get_contents("php://input");
$new_contact = json_decode($new_contact_json);
print_r($new_contact);
if(isset($_SESSION['id'])) {
    $sql = "UPDATE contacts SET first_name = \"$new_contact->first_name\", last_name = \"$new_contact->last_name\", birth_date = \"$new_contact->birth_date\" WHERE id = $new_contact->id";
    $result = $mysqli->query($sql);
    print_r($sql);
}


